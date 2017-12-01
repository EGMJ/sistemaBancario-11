<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerTransaccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        DB::unprepared('

        CREATE TRIGGER tr_transaccion AFTER insert ON transaccions
        FOR EACH ROW BEGIN
               
                      UPDATE cuentas SET saldo=saldo-new.monto,updated_at=now() WHERE id=new.id_cuenta;
                      UPDATE cuentas SET saldo=saldo+new.monto,updated_at=now() WHERE id=new.id_cuenta_destino;
                      select saldo into @cuenta_a from cuentas where id=new.id_cuenta;
                      select saldo into @cuenta_b from cuentas where id=new.id_cuenta_destino;
                      INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"TRANSACCION",-new.monto,@cuenta_a,concat("A Nro de Cuenta: ",new.id_cuenta_destino),new.id_cuenta,now(),now()); 
                INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"TRANSACCION",new.monto,@cuenta_b,concat("De Nro de Cuenta: ",new.id_cuenta),new.id_cuenta_destino,now(),now()); 
        END

        ');
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
