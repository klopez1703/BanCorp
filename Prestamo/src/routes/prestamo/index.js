const express = require('express');
const mysql = require('../../database/db');
const router = express.Router();

router.get("/leer", (req, res) => {
    mysql.query("CALL LIST_PRESTAMO", (err, rows, fields) => {
      if (!err) res.send(rows[0]);
      else console.log(err);
    });
  });

  router.get("/leertodo", (req, res) => {
    mysql.query("CALL LISTPROCEDURE", (err, rows, fields) => {
      if (!err) res.send(rows[0]);
      else console.log(err);
    });
  });

router.post('/guardar',(req,res)=>{
    const { PD_IMPORTE_PRESTAMO, PD_INTERESES, PI_PLAZO_ANUAL, PI_N_PAGOSANUAL, PD_SALDO_FINAL} = req.body;
        console.log(req.body);
    const sql = `
    SET @PD_IMPORTE_PRESTAMO=?;
    SET @PD_INTERESES=?;
    SET @PI_PLAZO_ANUAL=?;
    SET @PI_N_PAGOSANUAL=?;
    SET @PD_SALDO_FINAL=?;
        CALL SAVEPRESTAMO(@PD_IMPORTE_PRESTAMO, @PD_INTERESES,@PI_PLAZO_ANUAL, @PI_N_PAGOSANUAL, @PD_SALDO_FINAL)`;
        mysql.query(sql,[PD_IMPORTE_PRESTAMO,PD_INTERESES, PI_PLAZO_ANUAL, PI_N_PAGOSANUAL, PD_SALDO_FINAL ], (err, rows, fields) => {

                  if (!err){
                      res.send("Insertion Completed");
                  }else{
                      console.log(err);
                  }
                   
                });
});

router.put("/actualizar", (req, res) => {
    const { PB_COD_PRESTAMO, PD_IMPORTE_PRESTAMO, PD_INTERESES, PI_PLAZO_ANUAL, PI_N_PAGOSANUAL, PD_SALDO_FINAL } = req.body;
    const sql = `
      SET @PB_COD_PRESTAMO=?;
      SET @PD_IMPORTE_PRESTAMO=?;
      SET @PD_INTERESES=?;
      SET @PI_PLAZO_ANUAL=?;
      SET @PI_N_PAGOSANUAL=?;
      SET @PD_SALDO_FINAL=?;
      CALL UPDATE_PROCEDURE_PRESTAMO(@PB_COD_PRESTAMO,@PD_IMPORTE_PRESTAMO,@PD_INTERESES,@PI_PLAZO_ANUAL,
                                @PI_N_PAGOSANUAL, @PD_SALDO_FINAL);`;
    mysql.query(
      sql,
      [PB_COD_PRESTAMO, PD_IMPORTE_PRESTAMO, PD_INTERESES, PI_PLAZO_ANUAL, PI_N_PAGOSANUAL, PD_SALDO_FINAL],
      (err, rows, fields) => {
        if (!err) res.send("Updation Done");
        else console.log(err);
      }
    );
  });

  router.delete("/eliminartodo", (req, res) => {
    const { PB_COD_PAGO, PB_COD_PRESTAMO} = req.body;
    const sql = `
      SET @PB_COD_PAGO=?;
      SET @PB_COD_PRESTAMO=?;
      CALL DEL_PROCEDURE(@PB_COD_PAGO,@PB_COD_PRESTAMO);`;
    mysql.query(
      sql,
      [PB_COD_PAGO, PB_COD_PRESTAMO],
      (err, rows, fields) => {
        if (!err) res.send("Data Deletion Successful");
        else console.log(err);
      }
    );
  });

  router.delete("/eliminar", (req, res) => {
    const { PB_COD_PRESTAMO} = req.body;
    const sql = `
      SET @PB_COD_PRESTAMO=?;
      CALL DELETEPRESTAMO(@PB_COD_PRESTAMO);`;
    mysql.query(
      sql,
      [PB_COD_PRESTAMO],
      (err, rows, fields) => {
        if (!err) res.send("Data Deletion Successful");
        else console.log(err);
      }
    );
  });
  

module.exports=router;