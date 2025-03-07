import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { ApiService } from '../services/api.service';
import { MatButtonModule } from '@angular/material/button';
import { MatDialog, MatDialogModule } from '@angular/material/dialog';

@Component({
  selector: 'app-eliminar-usuario',
  standalone: true,
  imports: [MatButtonModule, MatDialogModule],
  templateUrl: './eliminar-usuario.component.html',
  styleUrl: './eliminar-usuario.component.css'
})
export class EliminarUsuarioComponent {
  constructor(@Inject(MAT_DIALOG_DATA) public data: any, 
    private dialogRef: MatDialogRef<EliminarUsuarioComponent>, 
    private apiService: ApiService) {}
  
    closeDialog() {
      this.dialogRef.close();
    }

    confirmarEliminacion() {
      this.dialogRef.close('eliminar');
    }
}
