const express = require("express");
const router = express.Router();
const mysqlConnection = require('../../database/db');
/* GET */

router.get("/leer",(req, res) => {
   mysqlConnection.query("call selec", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
});
/* POST */
//Insertar un activos
router.post("/guardar", (req, res) => {
const{
     saldo,
   }=  req.body;
    const sql=`
    SET @saldo=?;

    call ins_balance(@saldo);`;
    mysqlConnection.query( 
      sql, [saldo,],
           
     (err, rows, fields) => {
   if (!err) res.send("Insertion Completed");
   else console.log(err);
   }
 
    );
});
router.put("/actualizar", (req, res) => {
  const { cod_estado_resultado,saldo } = req.body;
  const sql = `
    SET @cod_estado_resultado=?;
    SET @saldo=?;

    CALL Actulizar (@cod_estado_resultado,@saldo);`;
  mysqlConnection.query(
    sql,
    [cod_estado_resultado,saldo],
    (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    }
  );
});

router.delete("/eliminar/:cod_estado_resutado", (req, res) => {
  //const { table, cod_estado_resultado } = req.body;
  const sql = `
    SET @table=?;
    CALL Eliminar_registro,(@table,?);`;
  mysqlConnection.query(
    sql,
    [req.body.table, req.params.cod],
    (err, rows, fields) => {
      if (!err) res.send("Data Deletion Successful");
      else console.log(err);
    }
  );
});




module.exports = router;