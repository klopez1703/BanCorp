const express = require("express");
const router = express.Router();
const mysqlConnection = require('../../database/db');
/* GET */

router.get("/ingresos",(req, res) => {
   mysqlConnection.query("call selec", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
});
/* POST */
//Insertar un activos
router.post("/ingresos", (req, res) => {
const{
     NOM_INGRESO,
     VALOR_INGRESO,
   }=  req.body;
    const sql=`
    SET @NOM_INGRESO=?;
    SET @VALOR_INGRESO=?;

    call ins_balance(@NOM_INGRESO,@VALOR_INGRESO);`;
    mysqlConnection.query( 
      sql, [NOM_INGRESO,VALOR_INGRESO],
           
     (err, rows, fields) => {
   if (!err) res.send("Insertion Completed");
   else console.log(err);
   }
 
  );
});

router.put("/ingresos", (req, res) => {
  const { cod_ingreso,nom_ingreso,valor_ingreso } = req.body;
  const sql = `
    SET @cod_ingreso=?;
    SET @nom_ingreso=?;
    SET @valor_ingreso=?;
    CALL Actulizar (@cod_ingreso,@nom_ingreso,@valor_ingreso);`;
  mysqlConnection.query(
    sql,
    [cod_ingreso,nom_ingreso,valor_ingreso],
    (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    }
  );
});

router.delete("/ingresos/:cod_ingreso", (req, res) => {
  //const { table, cod } = req.body;
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