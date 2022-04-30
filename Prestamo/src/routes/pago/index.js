const express = require('express');
const mysql = require('../../database/db');
const router = express.Router();

router.get("/leer", (req, res) => {
    mysql.query("CALL LIST_PAGO", (err, rows, fields) => {
      if (!err) res.send(rows[0]);
      else console.log(err);
    });
  });

router.post('/guardar',(req,res)=>{
    const { PAGO_PROGRAMADO,N_PAGOS_PROGRAMADO ,PAGO_ANTICIPADO} = req.body;
        console.log(req.body);
    const sql = `
    SET @PAGO_PROGRAMADO=?;
    SET @N_PAGOS_PROGRAMADO=?;
    SET @PAGO_ANTICIPADO=?;
        CALL SAVEPROCEDURE(@PAGO_PROGRAMADO, @N_PAGOS_PROGRAMADO, @PAGO_ANTICIPADO)`;
        mysql.query(sql,[PAGO_PROGRAMADO,N_PAGOS_PROGRAMADO ,PAGO_ANTICIPADO ], (err, rows, fields) => {

                  if (!err){
                      res.send("Insertion Completed");
                  }else{
                      console.log(err);
                  }
                   
                });
});

router.put("/actualizar", (req, res) => {
    const { PB_COD_PAGO, PD_PAGO_PROGRAMADO, PI_N_PAGOS_PROGRAMADO, PD_PAGO_ANTICIPADO } = req.body;
    const sql = `
      SET @PB_COD_PAGO=?;
      SET @PD_PAGO_PROGRAMADO=?;
      SET @PI_N_PAGOS_PROGRAMADO=?;
      SET @PD_PAGO_ANTICIPADO=?;
      CALL UPDATE_PROCEDURE_PAGO(@PB_COD_PAGO,@PD_PAGO_PROGRAMADO,@PI_N_PAGOS_PROGRAMADO,@PD_PAGO_ANTICIPADO);`;
    mysql.query(
      sql,
      [PB_COD_PAGO, PD_PAGO_PROGRAMADO, PI_N_PAGOS_PROGRAMADO, PD_PAGO_ANTICIPADO],
      (err, rows, fields) => {
        if (!err) res.send("Updation Done");
        else console.log(err);
      }
    );
  });

   router.delete("/eliminar", (req, res) => {
     const { PB_COD_PAGO} = req.body;
     const sql = `
     SET @PB_COD_PAGO=?;
     CALL DELETEPAGO(@PB_COD_PAGO);`;
     mysql.query(
       sql,
       [PB_COD_PAGO],
      (err, rows, fields) => {
         if (!err) res.send("Data Deletion Successful");
         else console.log(err);
       }
     );
   });

  
  

module.exports=router;