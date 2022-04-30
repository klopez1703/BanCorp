const express = require("express");
const router = express.Router();
const mysqlConnection = require('../../database/db');
/* GET */

router.get("/pasivos",(req, res) => {
   mysqlConnection.query("call selec", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
});
/* POST */
//Insertar un activos
router.post("/pasivos", (req, res) => {
const{
     NOM_pasivo,
     VALOR_pasivo,
   }=  req.body;
    const sql=`
    SET @NOM_pasivo=?;
    SET @VALOR_PASIVO=?;

    call ins_balance(@NOM_PASIVO,@VALOR_PASIVO);`;
    mysqlConnection.query( 
      sql, [NOM_PASIVO,VALOR_PASIVO],
           
     (err, rows, fields) => {
   if (!err) res.send("Insertion Completed");
   else console.log(err);
   }
 
    )
});

router.put("/pasivos", (req, res) => {
  const { cod_pasivo,NOM_pasivo,VALOR_pasivo } = req.body;
  const sql = `
    SET @cod_pasivo=?;
    SET @NOM_pasivo=?;
    SET @VALOR_pasivo=?;
    CALL Actulizar (@cod_pasivo,@NOM_pasivo,@VALOR_pasivo);`;
  mysqlConnection.query(
    sql,
    [cod_pasivo,NOM_pasivo,VALOR_pasivo],
    (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    }
  );
});

router.delete("/pasivo/:cod_pasivo", (req, res) => {
  //const { table, cod_pasivo } = req.body;
  const sql = `
    SET @table=?;
    CALL Eliminar_registro,(@table,?);`;
  mysqlConnection.query(
    sql,
    [req.body.table, req.params.cod_pasivo],
    (err, rows, fields) => {
      if (!err) res.send("Data Deletion Successful");
      else console.log(err);
    }
  );
});



module.exports = router;