import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class UsuariosService {
  
  apiurl='http://localhost:8080/CrudClases/controller/usuario.controller.php';

  constructor(
    private lector: HttpClient,
    private navegacion:Router
  ) { }
}
