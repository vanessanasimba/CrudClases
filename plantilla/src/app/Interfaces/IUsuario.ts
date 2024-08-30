export interface IUsuario {
    idUsuarios?: number; //opcional
    nombreUsuario: string;
    contrasenia: string;
    estado?: number;
    rolesIdRoles?: number;
}