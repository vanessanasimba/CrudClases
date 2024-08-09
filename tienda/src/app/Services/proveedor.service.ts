import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Iproveedor } from '../Interfaces/iproveedor';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProveedorService {
  apiurl='/NasimbaVanessa_Tarea2/controller/proveedoresCtrl.php?op=';


  constructor(private lector: HttpClient) { }

  todos():Observable<Iproveedor[]>{
    return this.lector.get<Iproveedor[]>(this.apiurl + 'todos');
  }
}
