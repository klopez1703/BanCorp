const express = require("express");
const router = express();
const mysqlConnection = require('../../database/db');

//*GET
router.get("/leerpersonas", (req, res) => {
  mysqlConnection.query("CALL LIST_PERSONA", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });
});

router.get(["/leercorreo" ], (req, res) => {
    mysql.query("CALL LIST_CORREO", (err, rows, fields) => {
      if (!err) res.send(rows[0]);
      else console.log(err);
    });
});

router.get(["/leertelefono" ], (req, res) => {
  mysql.query("CALL LIST_TELEFONO", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });

});

router.get(["/leerempleado" ], (req, res) => {
  mysql.query("CALL LIST_EMPLEADO", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });

});

router.get(["/leerusuario" ], (req, res) => {
  mysql.query("CALL LIST_USUARIO", (err, rows, fields) => {
    if (!err) res.send(rows[0]);
    else console.log(err);
  });

});
//*POST
router.post("/guardarpersonas", (req, res) => {
    const{ cod_persona, nom_persona, ape_persona, identidad, sex_persona, ind_civil, eda_persona, dir_persona,
       tip_persona, ind_persona, usr_registro, fec_registro,}= req.body;
    const sql =`
    SET @cod_persona =?;
    SET @nom_persona =?;
    SET @ape_persona =?;
    SET @identidad =?;
    SET @sex_persona =?;
    SET @ind_civil =?;
    SET @eda_persona =?;
    SET @dir_persona =?;
    SET @tip_persona =?;
    SET @ind_persona =?;
    SET @usr_registro =?;
    SET @fec_registro =?;
    CALL SAVEPERSONA(@cod_persona, @nom_persona, @ape_persona, @identidad, @sex_persona, @ind_civil, 
        @eda_persona, @dir_persona, @tip_persona, @ind_persona, @usr_registro, @fec_registro);`;

    mysqlConnection.query(
    sql,
    [ cod_persona, nom_persona, ape_persona, identidad, sex_persona, ind_civil, eda_persona, dir_persona,
        tip_persona, ind_persona, usr_registro, fec_registro,],
    (err, rows, fields) => {
      if (!err) res.send("Insertion Completed");
      else console.log(err);
    }
  );
});
router.post("/guardar", (req, res) => {
    const { cod_correo, correo, } = req.body;
    const sql = `
      SET @cod_correo=?;
      SET @correo=?;
      CALL SAVECORREO(@cod_correo,@correo)`;
    mysqlConnection.query(sql, [cod_correo, correo,], (err, rows, fields) => {
      if (!err) res.send("Insertion Completed");
      else console.log(err);
    });
  });
router.post("/guardar", (req, res) => {
    const { cod_telefono, num_telefono, tip_telefono, usr_registro, fec_registro, } = req.body;
    const sql = `
      SET @cod_telefono=?;
      SET @num_telefono=?;
      SET @tip_telefono=?;
      SET @usr_registro=?;
      SET @fec_registro=?;
      CALL SAVETELEFONO (@cod_telefono,@num_telefono,@tip_telefono,@usr_Registro, fec_registro)`;
    mysqlConnection.query(sql, [cod_telefono, num_telefono ,tip_telefono, usr_registro,fec_registro], (err, rows, fields) => {
      if (!err) res.send("Insertion Completed");
      else console.log(err);
    });
  });

router.post(["/guardar" ], (req, res) => {
    const { cod_empleado ,nom_empleado ,ape_empleado ,identidad ,car_empleado, ind_empleado,} = req.body;
    const sql = `
      SET @cod_empleado=?;
      SET @nom_empleado=?;
      SET @ape_empleado=?;
      SET @identidad=?;
      SET @car_empleado=?;
      SET @ind_empleado=?;
      CALL SAVEEMPLEADO(@table,@cod);`;
    mysqlConnection.query(
        sql, [cod_empleado ,nom_empleado ,ape_empleado ,identidad ,car_empleado, ind_empleado], (err, rows, fields) => {
      if (!err) res.send(rows[2]);
      else console.log(err);
       }
    );
});


router.post("/guardar", (req, res) => {
        const { cod_usuario, usr_registro, clave,  } = req.body;
        const sql = `
          SET @cod_usuario=?;
          SET @usr_registro=?;
          SET @clave=?;
          CALL SAVEUSUARIO (@cod_usuario,@usr_registro,@clave)`;
        mysqlConnection.query(sql, [cod_usuario, usr_registro, clave], (err, rows, fields) => {
          if (!err) res.send("Insertion Completed");
          else console.log(err);
        }
   );
});

    
//*PUT

router.put("/actualizar", (req, res) => {
    const{ cod_persona, nom_persona, ape_persona, identidad, sex_persona, ind_civil, eda_persona, dir_persona,
       tip_persona, ind_persona, usr_registro, fec_registro,}= req.body;
    const sql =`
    SET @cod_persona =?;
    SET @nom_persona =?;
    SET @ape_persona =?;
    SET @identidad =?;
    SET @sex_persona =?;
    SET @ind_civil =?;
    SET @eda_persona =?;
    SET @dir_persona =?;
    SET @tip_persona =?;
    SET @ind_persona =?;
    SET @usr_registro =?;
    SET @fec_registro =?;
    CALL UPDATEPERSONA(@cod_persona, @nom_persona, @ape_persona, @identidad, @sex_persona, @ind_civil, 
        @eda_persona, @dir_persona, @tip_persona, @ind_persona, @usr_registro, @fec_registro);`;

  mysqlConnection.query(
    sql,
    [ cod_persona, nom_persona, ape_persona, identidad, sex_persona, ind_civil, eda_persona, dir_persona,
        tip_persona, ind_persona, usr_registro, fec_registro,], (err, rows, fields) => {
      if (!err) res.send("Updation Done"); 
      else console.log(err);
    }
  );
});
router.put("/actualizar", (req, res) => {
    const { cod_correo, correo, } = req.body;
    const sql = `
      SET @cod_correo=?;
      SET @correo=?;
      CALL SAVECORREO (@cod_correo,@correo)`;
    mysqlConnection.query(
        sql, [cod_correo, correo,], (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
      }
    );
  });
router.post("/actualizar", (req, res) => {
    const { cod_telefono, num_telefono, tip_telefono, usr_registro, fec_registro, } = req.body;
    const sql = `
      SET @cod_telefono=?;
      SET @num_telefono=?;
      SET @tip_telefono=?;
      SET @usr_registro=?;
      SET @fec_registro=?;
      CALL SAVETELEFONO(@cod_telefono,@num_telefono,@tip_telefono,@usr_registro, fec_registro);`;
    mysqlConnection.query(
        sql, [cod_telefono, num_telefono ,tip_telefono, usr_registro,fec_registro], (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
        }
    );
  });

router.put(["/actualizar" ], (req, res) => {
    const { cod_empleado ,nom_empleado ,ape_empleado ,identidad ,car_empleado, ind_empleado,} = req.body;
    const sql = `
      SET @cod_empleado=?;
      SET @nom_empleado=?;
      SET @ape_empleado=?;
      SET @identidad=?;
      SET @car_empleado=?;
      SET @ind_empleado=?;
      CALL SAVEEMPLEADO(@cod_empleado,@nom_empleado, @ape_empleado, @identidad, @car_empleado, @ind_empleado);`;
    mysqlConnection.query(
        sql, [cod_empleado ,nom_empleado ,ape_empleado ,identidad ,car_empleado, ind_empleado], (err, rows, fields) => {
      if (!err) res.send("Updation Done");
      else console.log(err);
        }
    );
});

router.post("/actualizar", (req, res) => {
    const { cod_usuario, usr_registro, clave,} = req.body;
    const sql = `
      SET @cod_usuario=?;
      SET @usr_registro=?;
      SET @clave=?;
      CALL SAVEUSUARIO (@cod_usuario,@usr_registro,@clave);`;
    mysqlConnection.query(
        sql, [cod_usuario, usr_registro, clave], (err, rows, fields) => {
        if (!err) res.send("Updation Done");
        else console.log(err);
        }

    );      
});
//*DELETE
router.put("/eliminar", (req, res) => {
  const{ cod_persona, nom_persona, ape_persona, identidad, sex_persona, ind_civil, eda_persona, dir_persona,
     tip_persona, ind_persona, usr_registro, fec_registro,}= req.body;
  const sql =`
  SET @cod_persona =?;
  SET @nom_persona =?;
  SET @ape_persona =?;
  SET @identidad =?;
  SET @sex_persona =?;
  SET @ind_civil =?;
  SET @eda_persona =?;
  SET @dir_persona =?;
  SET @tip_persona =?;
  SET @ind_persona =?;
  SET @usr_registro =?;
  SET @fec_registro =?;
  CALL DELETEPERSONA(@cod_persona, @nom_persona, @ape_persona, @identidad, @sex_persona, @ind_civil, 
      @eda_persona, @dir_persona, @tip_persona, @ind_persona, @usr_registro, @fec_registro);`;

mysqlConnection.query(
  sql,
  [ cod_persona, nom_persona, ape_persona, identidad, sex_persona, ind_civil, eda_persona, dir_persona,
      tip_persona, ind_persona, usr_registro, fec_registro,], (err, rows, fields) => {
    if (!err) res.send("Data Deletion Successful"); 
    else console.log(err);
  }
);
});
router.put("/eliminar", (req, res) => {
  const { cod_correo, correo, } = req.body;
  const sql = `
    SET @cod_correo=?;
    SET @correo=?;
    CALL DELETECORREO (@cod_correo,@correo)`;
  mysqlConnection.query(
      sql, [cod_correo, correo,], (err, rows, fields) => {
    if (!err) res.send("Data Deletion Successful");
    else console.log(err);
    }
  );
});
router.put("/eliminar", (req, res) => {
  const { cod_telefono, num_telefono, tip_telefono, usr_registro, fec_registro, } = req.body;
  const sql = `
    SET @cod_telefono=?;
    SET @num_telefono=?;
    SET @tip_telefono=?;
    SET @usr_registro=?;
    SET @fec_registro=?;
    CALL DELETETELEFONO(@cod_telefono,@num_telefono,@tip_telefono,@usr_registro, fec_registro);`;
  mysqlConnection.query(
      sql, [cod_telefono, num_telefono ,tip_telefono, usr_registro,fec_registro], (err, rows, fields) => {
    if (!err) res.send("Data Deletion Successful");
    else console.log(err);
      }
  );
});

router.delete(["/eliminar" ], (req, res) => {
  const { cod_empleado ,nom_empleado ,ape_empleado ,identidad ,car_empleado, ind_empleado,} = req.body;
  const sql = `
    SET @cod_empleado=?;
    SET @nom_empleado=?;
    SET @ape_empleado=?;
    SET @identidad=?;
    SET @car_empleado=?;
    SET @ind_empleado=?;
    CALL DELETEEMPLEADO(@cod_empleado,@nom_empleado, @ape_empleado, @identidad, @car_empleado, @ind_empleado);`;
  mysqlConnection.query(
      sql, [cod_empleado ,nom_empleado ,ape_empleado ,identidad ,car_empleado, ind_empleado], (err, rows, fields) => {
    if (!err) res.send("Data Deletion Successful");
    else console.log(err);
      }
  );
});

router.delete("/eliminar", (req, res) => {
  const { cod_usuario, usr_registro, clave,} = req.body;
  const sql = `
    SET @cod_usuario=?;
    SET @usr_registro=?;
    SET @clave=?;
    CALL SAVEUSUARIO (@cod_usuario,@usr_registro,@clave);`;
  mysqlConnection.query(
      sql, [cod_usuario, usr_registro, clave], (err, rows, fields) => {
      if (!err) res.send("Data Deletion Successful");
      else console.log(err);
      }

  );      
});  
module.exports = router;
