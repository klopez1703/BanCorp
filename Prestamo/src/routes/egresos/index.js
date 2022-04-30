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

router.post("/guardar", (req, res) => {
const{
     NOM_EGRESO,
     VALOR_EGRESO,
   }=  req.body;
    const sql=`
    SET @NOM_EGRESO=?;
    SET @VALOR_EGRESO=?;

    call ins_balance(@NOM_EGRESO,@VALOR_EGRESO);`;
    mysqlConnection.query( 
      sql, [NOM_EGRESO,VALOR_EGRESO],
           
     (err, rows, fields) => {
   if (!err) res.send("Insertion Completed");
   else console.log(err);
   }
 
    )
});
router.put("/actualizar", (req, res) => {
  const { cod_ingreso,nom_egreso,valor_egreso } = req.body;
  const sql = `
    SET @cod_egreso=?;
    SET @nom_egreso=?;
    SET @valor_egreso=?;
    CALL Actulizar (@cod_egreso,@nom_egreso,@valor_egreso);`;
  mysqlConnection.query(
    sql,
    [cod_egreso,nom_egreso,valor_egreso],
    (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    }
  );
});

 //Eliminar un registro mediante el codigo

router.delete("/eliminar/:cod_egreso", (req, res) => {
  //const { table, cod_egreso } = req.body;
  const sql = `
    SET @table=?;
    CALL Eliminar_registro,(@table,?);`;
  mysqlConnection.query(
    sql,
    [req.body.table, req.params.cod_egreso],
    (err, rows, fields) => {
      if (!err) res.send("Data Deletion Successful");
      else console.log(err);
    }
  );
});


module.exports = router;