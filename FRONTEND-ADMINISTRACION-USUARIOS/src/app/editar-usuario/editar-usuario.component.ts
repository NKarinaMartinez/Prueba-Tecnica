import { Component, Inject, OnInit } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { MatDividerModule } from '@angular/material/divider';
import { MatButtonModule } from '@angular/material/button';
import { MatDialog, MatDialogModule } from '@angular/material/dialog';
import { ApiService } from '../services/api.service';
import { CommonModule } from '@angular/common';
import { FormBuilder, ReactiveFormsModule, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-editar-usuario',
  standalone: true,
  imports: [MatDividerModule, 
    MatButtonModule, 
    MatDialogModule, 
    CommonModule,
    ReactiveFormsModule
  ],
  templateUrl: './editar-usuario.component.html',
  styleUrl: './editar-usuario.component.css'
})
export class EditarUsuarioComponent implements OnInit{
  dataDepartamentos:any [] = [];
  dataCargos:any [] = [];
  usuarioActualizadoForm: FormGroup;
  dataUsers: any [] = [];

  constructor(
    @Inject(MAT_DIALOG_DATA) public data: any, 
    private dialogRef: MatDialogRef<EditarUsuarioComponent>, 
    private apiService:ApiService,
    private fb: FormBuilder
  ) {
    this.usuarioActualizadoForm = this.fb.group({
      id: [this.data.id],  // Este es el id del usuario
      usuario: [this.data.usuario, Validators.required],
      idDepartamento: [this.data.idDepartamento, Validators.required],
      idCargo: [this.data.idCargo, Validators.required],
      email: [this.data.email, [Validators.required, Validators.email]],
      primerNombre: [this.data.primerNombre, Validators.required],
      segundoNombre: [this.data.segundoNombre],
      primerApellido: [this.data.primerApellido, Validators.required],
      segundoApellido: [this.data.segundoApellido]
    });
  }

  actualizarUsuario() {
    if (this.usuarioActualizadoForm.valid) {
      const usuarioActualizado = this.usuarioActualizadoForm.value;
      this.apiService.editarUser(usuarioActualizado).subscribe(
        response => {
          console.log('Usuario actualizado:', response);
          this.dialogRef.close();
        },
        error => {
          console.error('Error al actualizar usuario:', error);
        }
      );
    } else {
      console.log('Formulario inválido');
    }
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
}
