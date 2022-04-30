const express = require("express");
const router = express.Router();
const mysqlConnection = require('../../database/db');
/* GET */

router.get("/balance_general",(req, res) => {
   mysqlConnection.query("call selec", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
});
/* POST */
router.post("/balance_general", (req, res) => {
const{
     saldo_b,
   }=  req.body;
    const sql=`
    SET @saldo_b=?;

    call ins_balance(@saldo_b);`;
    mysqlConnection.query( 
      sql, [saldo_b,],
           
     (err, rows, fields) => {
   if (!err) res.send("Insertion Completed");
   else console.log(err);
   }
 
    )
});

router.put("/BALANCE_GENERAL", (req, res) => {
  const { cod_balance,saldo_b} = req.body;
  const sql = `
    SET @COD_BALANCE=?;
    SET @saldo_b=?;
    CALL Actulizar (COD_BALANCE,saldo_b);`;
  mysqlConnection.query(
    sql,
    [COD_BALANCE,saldo_b],
    (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    }
  );
});
 //Eliminar un registro mediante el codigo
 
router.delete("/BALANCE_GENERAL/:COD_BALANCE", (req, res) => {
  //const { table,cod_balance } = req.body;
  const sql = `
    SET @table=?;
    CALL Eliminar_rejistro,?);`;
  mysqlConnection.query(
    sql,
    [req.body.table, req.params.COD_BALANCE],
    (err, rows, fields) => {
      if (!err) res.send("Data Deletion Successful");
      else console.log(err);
    }
  );
});


module.exports = router;