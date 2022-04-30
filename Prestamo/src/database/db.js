//CONSTANTE PARA EL PAQUETE DE MYSQL
const mysql = require('mysql');

//CONECTAR A LA BD (Mysql)
var mysqlConnection = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "bancorp",
    multipleStatements: true,
});

//TEST DE CONEXION A BASE DE DATOS
mysqlConnection.connect((err)=>{
    if(!err){
        console.log("Conexion Exitosa");
    }else{
        console.log("Error al conectar a la BD");
    }
});

module.exports = mysqlConnection;