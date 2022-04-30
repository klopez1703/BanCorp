const express = require("express");
const router = express.Router();
const mysqlConnection = require('../../database/db');
/* GET */

router.get("/compras",(req, res) => {
   mysqlConnection.query("call selec", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
});
/* POST */
router.post("/compras", (req, res) => {
const{
     NOM_COMPRA,
     PRECIO,
   }=  req.body;
    const sql=`
    SET @NOM_COMPRA=?;
    SET @PRECIO=?;

    call ins_balance(@NOM_COMPRA,@PRECIO);`;
    mysqlConnection.query( 
      sql, [NOM_COMPRA,PRECIO],
           
     (err, rows, fields) => {
   if (!err) res.send("Insertion Completed");
   else console.log(err);
   }
 
    )
});

router.put("/compras", (req, res) => {
  const { cod_compra,NOM_COMPRA,PRECIO} = req.body;
  const sql = `
    SET @cod_compra=?;
    SET @NOM_COMPRA=?;
    SET @PRECIO=?;
    CALL Actulizar (@cod_compra,@NOM_COMPRA,@PRECIO);`;
  mysqlConnection.query(
    sql,
    [cod_compra,NOM_COMPRA,PRECIO],
    (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    }
  );
});
 
router.delete("/compras/:cod_compras", (req, res) => {
  //const { table, cod_compra } = req.body;
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