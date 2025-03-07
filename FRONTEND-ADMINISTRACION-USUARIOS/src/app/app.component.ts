import { Component, inject, OnInit } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { MatDividerModule } from '@angular/material/divider';
import { MatSelectModule } from '@angular/material/select';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatButtonModule } from '@angular/material/button';
import { MatCardModule } from '@angular/material/card';
import { MatTableModule } from '@angular/material/table';
import { ApiService } from './services/api.service';
import {
  MAT_DIALOG_DATA,
  MatDialog,
  MatDialogActions,
  MatDialogClose,
  MatDialogContent,
  MatDialogRef,
  MatDialogTitle,
} from '@angular/material/dialog';
import { CrearUsuarioComponent } from './crear-usuario/crear-usuario.component';
import { EditarUsuarioComponent } from './editar-usuario/editar-usuario.component';
import { CommonModule } from '@angular/common';
import { EliminarUsuarioComponent } from './eliminar-usuario/eliminar-usuario.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    RouterOutlet, 
    MatDividerModule, 
    MatSelectModule, 
    MatFormFieldModule,
    MatButtonModule,
    MatCardModule,
    MatTableModule,
    CommonModule
  ],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss'
})
export class AppComponent implements OnInit{
  dataUsers: any[] = [];
  dataDepartamentos: any[] = [];
  dataCargos: any[] = [];
  dataSource: any;
  totalRegistros: number = 0;

  displayedColumns: string[] = [
    'usuario',
    'nombre',
    'apellido',
    'idDepartamento',
    'idCargo',
    'email',
    'acciones'
  ];
  
  readonly dialog = inject(MatDialog);
  
  constructor(private apiService: ApiService) {}

  openDialogCrearUsuario(): void {
    const dialogRef = this.dialog.open(CrearUsuarioComponent, {width: '700px'});

    dialogRef.afterClosed().subscribe(result => {
      console.log('The dialog was closed');
      this.getDataUser();
    });
  }

  openDialogEditarUsuario(usuarioId: any): void {
    const usuario = this.dataUsers.find(user => user.id === usuarioId);
  
    if (usuario) {
      const dialogRefEdit = this.dialog.open(EditarUsuarioComponent, {
        data: usuario 
      });

      dialogRefEdit.afterClosed().subscribe(result => {
        console.log('The dialog was closed');
        this.getDataUser();
      });
    }
  }

  openDialogEliminarUsuario(usuarioId: any) {
    const dialogRefEliminar = this.dialog.open(EliminarUsuarioComponent, {
      data: { id: usuarioId }
    });
    dialogRefEliminar.afterClosed().subscribe(result => {
      if (result === 'eliminar') {
        this.eliminarUsuario(usuarioId);
      }
      this.getDataUser();
    });
  }

  eliminarUsuario(id: any) {
    this.apiService.eliminarUser(id).subscribe(response => {
      console.log('Usuario eliminado:', response);
    }, error => {
      console.error('Error al eliminar usuario:', error);
    });
  }

  ngOnInit(): void {
    this.getDataUser();
    this.getDataDepartamentos();
    this.getDataCargos();
  }

  getDataUser() {
    this.apiService.getAllUsers().subscribe(
      response => {
        this.dataUsers = response;
        console.log(this.dataUsers);
        this.dataSource = this.dataUsers;
        this.totalRegistros = this.dataSource.length;
      },
      (error) => {
        console.log('Hubo un error al obtener los datos', error);
      }
    );
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
