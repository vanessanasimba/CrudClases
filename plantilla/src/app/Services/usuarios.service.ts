import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { IUsuario } from '../Interfaces/IUsuario';
import { BehaviorSubject, Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UsuariosService {
  private loggedIn = new BehaviorSubject<boolean>(false);
  apiurl='http://localhost:8080/CrudClases/controller/usuario.controller.php?op=';

  constructor(
    private lector: HttpClient,
    private navegacion:Router
  ) { }

  login(usuario:IUsuario){
    return this.lector.post<IUsuario>(this.apiurl + 'login', usuario)
    .subscribe((respuesta)=>{
      if (respuesta) {
        sessionStorage.setItem('nombreUsuario', respuesta.nombreUsuario);
        sessionStorage.setItem('rolesIdRoles', respuesta.rolesIdRoles.toString());
        localStorage.setItem('rolesIdRoles', respuesta.rolesIdRoles.toString());
        this.loggedIn.next(true);
        this.navegacion.navigate(['/dashboard/default']);
      }
    });
  }

  logout(){
    sessionStorage.clear();
    localStorage.clear();
    this.navegacion.navigate(['/login']);
  }

  isLoggedIn() {
    return this.loggedIn.asObservable();
  }

  checkLoginStatus() {
    const usuario = sessionStorage.getItem('nombreUsuario');
    if (usuario ) {
      this.loggedIn.next(true);
    } else {
      this.loggedIn.next(false);
    }
  }

  todos():Observable<IUsuario[]>{
    return this.lector.get<IUsuario[]>(this.apiurl + 'todos');
  }

  uno(usuario:IUsuario):Observable<IUsuario>{
    let formData = new FormData();
    formData.append('idUsuarios', usuario.idUsuarios.toString());
    return this.lector.post<IUsuario>(this.apiurl + 'uno',usuario);
  }
}