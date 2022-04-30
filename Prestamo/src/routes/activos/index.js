const express = require("express");
const router = express.Router();
const mysqlConnection = require('../../database/db');
/* GET */

router.get("/activos",(req, res) => {
   mysqlConnection.query("call selec", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
});
/* POST */

router.post("/activos", (req, res) => {
const{
     NOM_ACTIVO,
     VALOR_ACTIVO,
   }=  req.body;
    const sql=`
    SET @NOM_ACTIVO=?;
    SET @VALOR_ACTIVO=?;

    call ins_balance(@NOM_ACTIVO,@VALOR_ACTIVO);`;
    mysqlConnection.query( 
      sql, [NOM_ACTIVO,VALOR_ACTIVO],
           
     (err, rows, fields) => {
   if (!err) res.send("Insertion Completed");
   else console.log(err);
   }
 
    )
});
router.put("/activos", (req, res) => {
  const { cod_activo,NOM_ACTIVO,VALOR_ACTIVO } = req.body;
  const sql = `
    SET @cod_activo=?;
    SET @NOM_ACTIVO=?;
    SET @VALOR_ACTIVO=?;
    CALL Actulizar (@cod_activo,@NOM_ACTIVO,@VALOR_ACTIVO);`;
  mysqlConnection.query(
    sql,
    [cod_activo,NOM_ACTIVO,VALOR_ACTIVO],
    (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    }
  );
});


router.delete("/activos/:cod_activo", (req, res) => {
  //const { table, cod_activo } = req.body;
  const sql = `
    SET @table=?;
    CALL Eliminar_rejistro,(@table,?);`;
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