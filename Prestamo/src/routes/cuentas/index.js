const express = require("express");
const router = express.Router();
const mysql = require('../../database/db');

//*GET
router.get("/leer", (req, res) => {
  mysql.query("CALL LIST_CUENTAS", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
});
router.get(["/leerclientes" ], (req, res) => {
    mysql.query("CALL LIST_CLIENTES", (err, rows, fields) => {
      if (!err) res.send(rows[0]);
      else console.log(err);
    });
    
});
router.get(["/leermovimientos" ], (req, res) => {
  mysql.query("CALL LIST_MOVIMIENTOS", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
/*POST*/
});
router.post("/guardarcuenta", (req, res) => {
    const{ cod_cta, num_cta, tip_cta, fec_registro, sal_cta, ind_cta}= req.body;
    const sql =`
    SET @cod_cta =?;
    SET @num_cta =?;
    SET @tip_cta =?;
    SET @fec_registro =?;
    SET @sal_cta =?;
    SET @ind_cta =?; 
    CALL SAVECUENTA (@cod_cta, @num_cta, @tip_cta, @fec_registro, @sal_cta, @ind_cta);`;

    mysql.query(
    sql,
    [ cod_cta, num_cta, tip_cta, fec_registro, sal_cta, ind_cta],
    (err, rows, fields) => {
      if (!err) res.send("Insertion Completed");
      else console.log(err);
    }
  );
});
router.post("/guardarclientes", (req, res) => {
    const { cod_cliente, cod_cta, } = req.body;
    const sql = `
      SET @cod_cliente=?;
      SET @cod_cuenta=?;
      CALL SAVECLIENTES (@cod_cliente,@cod_cta)`;
    mysql.query(sql, [cod_cliente, cod_cta], (err, rows, fields) => {
      if (!err) res.send("Insertion Completed");
      else console.log(err);
    });
  });
router.post("/guardartelefono", (req, res) => {
    const { num_movimientos, fec_movimientos, mon_movimiento, tip_movimiento, } = req.body;
    const sql = `
      SET @num_movimientos=?;
      SET @tip_movimiento=?;
      SET @mon_movimiento =?;
      SET @fec_movimientos=?;
      CALL SAVETELEFONO (@num_movimientos, @fec_movimientos, @mon_movimiento, @tip_movimiento)`;
    mysql.query(sql, [num_movimientos, fec_movimientos, mon_movimiento, tip_movimiento], (err, rows, fields) => {
      if (!err) res.send("Insertion Completed");
      else console.log(err);
    });
});
//*PUT

router.put("/actualizarcuentas", (req, res) => {
    const{ cod_cta, num_cta, tip_cta, fec_registro, sal_cta, ind_cta}= req.body;
    const sql =`
    SET @cod_cta =?;
    SET @num_cta =?;
    SET @tip_cta =?;
    SET @fec_registro =?;
    SET @sal_cta =?;
    SET @ind_cta =?; 
    CALL UPDATE_PROCEDURE_CUENTAS (@cod_cta, @num_cta, @tip_cta, @fec_registro, @sal_cta, @ind_cta);`;

    mysql.query(
    sql,
    [ cod_cta, num_cta, tip_cta, fec_registro, sal_cta, ind_cta],
    (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    }
  );
});

router.put("/actualizarclientes", (req, res) => {
    const { cod_cliente, cod_cta, } = req.body;
    const sql = `
    SET @cod_cliente=?;
    SET @cod_cuenta=?;
    CALL SAVECLIENTES (@cod_cliente,@cod_cta)`;
    mysql.query(sql, [cod_cliente, cod_cta], (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    });
  });
router.put("/actualizarmovimientos", (req, res) => {
    const { num_movimientos, fec_movimientos, mon_movimiento, tip_movimiento, } = req.body;
    const sql = `
      SET @num_movimientos=?;
      SET @tip_movimiento=?;
      SET @mon_movimiento =?;
      SET @fec_movimientos=?;
      CALL UPDATE_PROCEDURE_MOVIMIENTOS (@num_movimientos, @fec_movimientos, @mon_movimiento, @tip_movimiento)`;
    mysql.query(sql, [num_movimientos, fec_movimientos, mon_movimiento, tip_movimiento], (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
    });
  });
  /*DELETE*/
  
  router.delete(["/eliminarcuentas" ], (req, res) => {
    const{ cod_cta, num_cta, tip_cta, fec_registro, sal_cta, ind_cta}= req.body;
    const sql =`
    SET @cod_cta =?;
    SET @num_cta =?;
    SET @tip_cta =?;
    SET @fec_registro =?;
    SET @sal_cta =?;
    SET @ind_cta =?; 
    CALL DELETE_CUENTAS (@cod_cta, @num_cta, @tip_cta, @fec_registro, @sal_cta, @ind_cta);`;
    mysql.query(
    sql,
    [ cod_cta, num_cta, tip_cta, fec_registro, sal_cta, ind_cta],
    (err, rows, fields) => {
      if (!err) res.send("Data Deletion Successful");
      else console.log(err);
    }
  );
});
    router.delete(["/eliminarclientes" ], (req, res) => {
    const{ cod_cliente, cod_cta}= req.body;
    const sql =`
      SET @cod_cliente=?;
      SET @cod_cta=?
      CALL DELETE_CLIENTES ( @cod_cliente, @cod_cta  ,);`;
    mysql.query(
    sql,
    [ cod_cliente , cod_cta,],
    (err, rows, fields) => {
      if (!err) res.send("Data Deletion Successful");
      else console.log(err);
    }
   );
});
    router.delete(["/eliminarmovimientos" ], (req, res) => {
    const { num_movimientos, fec_movimientos, mon_movimiento, tip_movimiento, } = req.body;
    const sql = `
      SET @num_movimientos=?;
      SET @tip_movimiento=?;
      SET @mon_movimiento =?;
      SET @fec_movimientos=?;
      CALL DELETE_MOVIMIENTOS (@num_movimientos, @fec_movimientos, @mon_movimiento, @tip_movimiento)`;
    mysql.query(
    sql, 
    [num_movimientos, fec_movimientos, mon_movimiento, tip_movimiento], 
    (err, rows, fields) => {
      if (!err) res.send("Data Deletion Successful");
      else console.log(err);
    }
 );    
    });  
  module.exports = router;