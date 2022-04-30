const express = require("express");
const router = express.Router();
const mysqlConnection = require("../../database/db");

//METODO GET

//get para la tabla tar_credito
router.get('/tar_credito',(req,res)=>{  
  mysqlConnection.query('SELECT * FROM tar_credito',(err,rows,fields)=>{  
      if(!err)   
      res.send(rows);  
      else  
          console.log(err);           
  })  
  });

//get para la tabla solicitud
router.get('/solicitud',(req,res)=>{  
  mysqlConnection.query('SELECT * FROM solicitud',(err,rows,fields)=>{  
      if(!err)   
      res.send(rows);  
      else  
          console.log(err);           
  })  
  });

//get para la tabla info_empresa
router.get('/info_empresa',(req,res)=>{  
  mysqlConnection.query('SELECT * FROM info_empresa',(err,rows,fields)=>{  
      if(!err)   
      res.send(rows);  
      else  
          console.log(err);           
  })  
  });

//METODO POST

//post para la tabla tar_credito
router.post('/tar_credito',(req,res)=>{
  let emp=req.body;
  const sql= "SET @cod_tar_credito = ?; SET @tipo_tarjeta = ?;SET @nom_persona = ?; SET @num_tarjeta = ?; SET @fecha_cadu = ?; SET @cvv = ?; SET @cuotas = ?; SET @interes = ?;SET @monto_total = ?; SET @mes_primer_cuota = ?; SET @detalle = ?; SET @mes_ultima_cuota = ?; SET @cod_cta = ?;\
           CALL INS_TAR_CREDITO(@cod_tar_credito, @tipo_tarjeta, @nom_persona, @num_tarjeta, @fecha_cadu, @cvv, @cuotas, @interes, @monto_total, @mes_primer_cuota, @detalle, @mes_ultima_cuota, @cod_cta);"
  mysqlConnection.query(sql,[emp.cod_tar_credito, emp.tipo_tarjeta, emp.nom_persona, emp.num_tarjeta, emp.fecha_cadu, emp.cvv, emp.cuotas, emp.interes, emp.monto_total, emp.mes_primer_cuota, emp.detalle, emp.mes_ultima_cuota, emp.cod_cta],(err,rows,fields)=>{
  if(!err)
  res.send("Insertado completado");
  else console.log(err);    
  })
});

//post para la tabla solicitud
router.post('/solicitud',(req,res)=>{
  let emp=req.body;
  const sql= "SET @cod_solicitud = ?; SET @cod_persona = ?;SET @tar_solicitud = ?; SET @estado_solicitud = ?; \
           CALL INS_SOLICITUD(@cod_solicitud, @cod_persona, @tar_solicitud, @estado_solicitud);"
  mysqlConnection.query(sql,[emp.cod_solicitud, emp.cod_persona, emp.tar_solicitud, emp.estado_solicitud],(err,rows,fields)=>{
  if(!err)
  res.send("Insertado completado");
  else console.log(err);    
  })
});

//post para la tabla info_empresa
router.post('/info_empresa',(req,res)=>{
  let emp=req.body;
  const sql= "SET @cod_info_empresa = ?; SET @cod_solicitud = ?;SET @nom_empresa = ?; SET @tipo_empleado = ?; SET @cargo = ?; SET @antiguedad = ?\
           CALL INS_INFO_EMPRESA(@cod_info_empresa, @cod_solicitud, @nom_empresa, @tipo_empleado, @cargo, @antiguedad);"
  mysqlConnection.query(sql,[emp.cod_info_empresa, emp.cod_solicitud, emp.nom_empresa, emp.tipo_empleado, emp.cargo, emp.antiguedad],(err,rows,fields)=>{
  if(!err)
  res.send("Insertado completado");
  else console.log(err);    
  })
});


//METODO PUT

//put / actualizar para la tabla tar_credito
router.put("/tar_credito", (req, res) => {
  const { cod_tar_credito, tipo_tarjeta, nom_persona, num_tarjeta, fecha_cadu, cvv, cuotas, interes, monto_total, mes_primer_cuota, detalle, mes_ultima_cuota, cod_cta } = req.body;
  const sql = `
  "SET @cod_tar_credito = ?; SET @tipo_tarjeta = ?;SET @nom_persona = ?; SET @num_tarjeta = ?; SET @fecha_cadu = ?; SET @cvv = ?; SET @cuotas = ?; SET @interes = ?;SET @monto_total = ?; SET @mes_primer_cuota = ?; SET @detalle = ?; SET @mes_ultima_cuota = ?; SET @cod_cta = ?;\
    CALL UPD_TAR_CREDIT(@cod_tar_credito, @tipo_tarjeta, @nom_persona, @num_tarjeta, @fecha_cadu, @cvv, @cuotas, @interes, @monto_total, @mes_primer_cuota, @detalle, @mes_ultima_cuota, @cod_cta)"`;
  mysqlConnection.query(
    sql,
    [cod_tar_credito, tipo_tarjeta, nom_persona, num_tarjeta, fecha_cadu, cvv, cuotas, interes, monto_total, mes_primer_cuota, detalle, mes_ultima_cuota, cod_cta],
    (err, rows, fields) => {
      if (!err) res.send("Actualizacion exitosa");
      else console.log(err);
    }
  );
});

//put / actualizar para la tabla solicitud
router.put("/solicitud", (req, res) => {
  const { cod_solicitud, cod_persona, tar_solicitud, estado_solicitud } = req.body;
  const sql = `
  "SET @cod_solicitud = ?; SET @cod_persona = ?;SET @tar_solicitud = ?; SET @estado_solicitud = ?; \
    CALL UPD_TAR_CREDIT(@cod_solicitud, @cod_persona, @tar_solicitud, @estado_solicitud)"`;
  mysqlConnection.query(
    sql,
    [cod_solicitud, cod_persona, tar_solicitud, estado_solicitud],
    (err, rows, fields) => {
      if (!err) res.send("Actualizacion exitosa");
      else console.log(err);
    }
  );
});

//put / actualizar para la tabla info_empresa
router.put("/info_empresa", (req, res) => {
  const { cod_info_empresa, cod_solicitud, nom_empresa, tipo_empleado, cargo, antiguedad } = req.body;
  const sql = `
  "SET @cod_info_empresa = ?; SET @cod_solicitud = ?;SET @nom_empresa = ?; SET @tipo_empleado = ?; SET @cargo = ?; SET @antiguedad = ?;\
    CALL UPD_TAR_CREDIT(@cod_info_empresa, @cod_solicitud, @nom_empresa, @tipo_empleado, @cargo, @antiguedad)"`;
  mysqlConnection.query(
    sql,
    [cod_info_empresa, cod_solicitud, nom_empresa, tipo_empleado, cargo, antiguedad],
    (err, rows, fields) => {
      if (!err) res.send("Actualizacion exitosa");
      else console.log(err);
    }
  );
});

//METODO DELETE

//eliminar para la tabla tar_credito
router.delete('/tar_credito/:cod_tar_credito',(req,res)=>{  
  mysqlConnection.query('DELETE FROM tar_credito WHERE cod_tar_credito = ?',[req.params.id],(err,rows,fields)=>{  
  if(!err)   
  res.send("Eliminacion exitosa");  
  else  
      console.log(err);  
    
})  
});

//eliminar para la tabla solicitud
router.delete('/solicitud/:cod_solicitud',(req,res)=>{  
  mysqlConnection.query('DELETE FROM solicitud WHERE cod_solicitud = ?',[req.params.id],(err,rows,fields)=>{  
  if(!err)   
  res.send("Eliminacion exitosa");  
  else  
      console.log(err);  
    
})  
});

//eliminar para la tabla info_empresa
router.delete('/info_empresa/:cod_info_empresa',(req,res)=>{  
  mysqlConnection.query('DELETE FROM info_empresa WHERE cod_info_empresa = ?',[req.params.id],(err,rows,fields)=>{  
  if(!err)   
  res.send("Eliminacion exitosa");  
  else  
      console.log(err);  
    
})  
});

module.exports=router;