import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private apiUrl = 'http://127.0.0.1:8000/api';

  constructor(private http:HttpClient) { }

  public getAllUsers(): Observable<any> {
    return this.http.get(`${this.apiUrl}/usuarios`);
  }

  public getAllDepartamentos(): Observable<any> {
    return this.http.get(`${this.apiUrl}/listar_departamentos`);
  }

  public getAllCargos(): Observable<any> {
    return this.http.get(`${this.apiUrl}/listar_cargos`);
  }

  public CrearUser(dataUser: any) {
    return this.http.post(`${this.apiUrl}/crear_usuario`, dataUser);
  }

  public eliminarUser(id: any) {
    return this.http.delete(`${this.apiUrl}/eliminar_usuario/${id}`);
  }

  public editarUser(dataUser: any) {
    return this.http.put(`${this.apiUrl}/actualizar_usuario/${dataUser.id}`, dataUser);
  }
}
