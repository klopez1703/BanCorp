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
router.post("/patrimonio", (req, res) => {
const{
     NOM_PATRIMONIO,
     VALOR_PATRIMONIO,
   }=  req.body;
    const sql=`
    SET @NOM_PATRIMONIO=?;
    SET @VALOR_PATRIMONIO=?;

    call ins_balance(@NOM_PATRIMONIO,@VALOR_PATRIMONIO);`;
    mysqlConnection.query( 
      sql, [NOM_ACTIVO,VALOR_ACTIVO],
           
     (err, rows, fields) => {
   if (!err) res.send("Insertion Completed");
   else console.log(err);
   }
 
    )
});
router.put("/patrimonio", (req, res) => {
  const { cod_patrimonio,NOM_PATRIMONIO,VALOR_PATRIMONIO } = req.body;
  const sql = `
    SET @cod_patrimonio=?;
    SET @NOM_PATRIMONIO=?;
    SET @VALOR_PATRIMONIO=?;
    CALL Actulizar (@cod_patrimonio,@NOM_PATRIMONIO,@VALOR_PATRIMONIO);`;
  mysqlConnection.query(
    sql,
    [cod_patrimonio,NOM_PATRIMONIO,VALOR_PATRIMONIO],
    (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    }
  );
});
 
router.delete("/patrimonio/:cod_patrimonio", (req, res) => {
  //const { table, cod_patrimonio} = req.body;
  const sql = `
    SET @table=?;
    CALL Eliminar_registro,(@table,?);`;
  mysqlConnection.query(
    sql,
    [req.body.table, req.params.cod_patrimonio],
    (err, rows, fields) => {
      if (!err) res.send("Data Deletion Successful");
      else console.log(err);
    }
  );
});








module.exports = router;