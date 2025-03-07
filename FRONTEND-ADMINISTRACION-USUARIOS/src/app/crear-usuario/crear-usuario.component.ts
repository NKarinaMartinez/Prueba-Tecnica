import { Component, Inject, OnInit } from '@angular/core';
import { MAT_DIALOG_DATA } from '@angular/material/dialog';
import { MatDividerModule } from '@angular/material/divider';
import { MatDialogRef } from '@angular/material/dialog';
import { MatButtonModule } from '@angular/material/button';
import { MatDialog, MatDialogModule } from '@angular/material/dialog';
import { ApiService } from '../services/api.service';
import { CommonModule } from '@angular/common';
import { FormBuilder, ReactiveFormsModule, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-crear-usuario',
  standalone: true,
  imports: [MatDividerModule, MatButtonModule, MatDialogModule, CommonModule, ReactiveFormsModule],
  templateUrl: './crear-usuario.component.html',
  styleUrl: './crear-usuario.component.css'
})
export class CrearUsuarioComponent implements OnInit{
  dataDepartamentos:any [] = [];
  dataCargos:any [] = [];
  usuarioForm: FormGroup;
  
  constructor(@Inject(MAT_DIALOG_DATA) public data: any, 
  private dialogRef: MatDialogRef<CrearUsuarioComponent>, 
  private apiService: ApiService,
  private fb: FormBuilder
  ) {
    this.usuarioForm = this.fb.group({
      usuario: ['', [Validators.required, Validators.maxLength(100)]],
      email: ['', [Validators.required, Validators.email, Validators.maxLength(100)]],
      primerNombre: ['', [Validators.required, Validators.maxLength(100)]],
      segundoNombre: ['', [Validators.maxLength(100)]],
      primerApellido: ['', [Validators.required, Validators.maxLength(100)]],
      segundoApellido: ['', [Validators.maxLength(100)]],
      idDepartamento: ['', Validators.required],
      idCargo: ['', Validators.required]
    });
  }
  
  ngOnInit(): void {
    this.getDataDepartamentos();
    this.getDataCargos();
  }

  closeDialog(): void {
    this.dialogRef.close();
  }

  getDataDepartamentos() {
    this.apiService.getAllDepartamentos().subscribe(
      response => {
        this.dataDepartamentos = response;
        console.log(this.dataDepartamentos);
      },
      (error) => {
        console.log('Hubo un error al obtener los datos', error);
      }
    );
  }

  getDataCargos() {
    this.apiService.getAllCargos().subscribe(
      response => {
        this.dataCargos = response;
        console.log(this.dataCargos);
      },
      (error) => {
        console.log('Hubo un error al obtener los datos', error);
      }
    );
  }

  registrarUsuario() {
    if (this.usuarioForm.valid) {
      console.log('Formulario válido:', this.usuarioForm.value);

      this.apiService.CrearUser(this.usuarioForm.value).subscribe(
        response => {
          console.log('Usuario registrado:', response);
          this.dialogRef.close(true);
        },
        error => {
          console.error('Error al registrar usuario:', error);
        }
      );
    } else {
      console.log('Formulario inválido, revisa los errores');
    }
  }
}