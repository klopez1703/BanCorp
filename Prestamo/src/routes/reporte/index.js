const express = require("express");
const router = express.Router();
const mysqlConnection = require("../../database/db");


router.get("/leer", (req, res) => {
  mysqlConnection.query("CALL sp_select_reportes", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
});


router.post('/guardar',(req,res)=>{
    const { ID_REPORTE, COD_CTA, COD_USUARIO, SAL_ACRE, SAL_DEB, FEC_REPORTE, MOV_DESCR} = req.body;
        console.log(req.body);
    const sql = `
    SET @ID_REPORTE=?;
    SET @COD_CTA=?;
    SET @COD_USUARIO=?;
    SET @SAL_ACRE=?;
    SET @SAL_DEB=?;
    SET @FEC_REPORTE=?;
    SET @MOV_DESCR=?;
        CALL SAVEPROCEDURE(@ID_REPORTE, @COD_CTA, @COD_USUARIO, SAL_ACRE, SAL_DEB, FEC_REPORTE, MOV_DESCR)`;
        mysql.query(sql,[ ID_REPORTE, COD_CTA, COD_USUARIO, SAL_ACRE, SAL_DEB, FEC_REPORTE, MOV_DESCR], (err, rows, fields) => {

                  if (!err){
                      res.send("Insertion Completed");
                  }else{
                      console.log(err);
                  }
                   
                });
});


router.put("/actualizar", (req, res) => {
    const { ID_REPORTE, COD_CTA, COD_USUARIO, SAL_ACRE, SAL_DEB, FEC_REPORTE, MOV_DESCR } = req.body;
    const sql = `
    SET @ID_REPORTE=?;
    SET @COD_CTA=?;
    SET @COD_USUARIO=?;
    SET @SAL_ACRE=?;
    SET @SAL_DEB=?;
    SET @FEC_REPORTE=?;
    SET @MOV_DESCR=?;
      CALL UPDATE_PROCEDURE_PAGO( @ID_REPORTE, @COD_CTA, @COD_USUARIO, SAL_ACRE, SAL_DEB, FEC_REPORTE, MOV_DESCR);`;
    mysql.query(
      sql,
      [ ID_REPORTE, COD_CTA, COD_USUARIO, SAL_ACRE, SAL_DEB, FEC_REPORTE, MOV_DESCR],
      (err, rows, fields) => {
        if (!err) res.send("Updation Done");
        else console.log(err);
      }
    );
  });

  router.delete("/eliminar", (req, res) => {
    const { ID_REPORTE} = req.body;
    const sql = `
    SET @COD_CTA=?;
        CALL DEL_PROCEDURE(@ID_REPORTE);`;
    mysql.query(
      sql,
      [ID_REPORTE],
      (err, rows, fields) => {
        if (!err) res.send("Data Deletion Successful");
        else console.log(err);
      }
    );
  });
  

module.exports=router;
