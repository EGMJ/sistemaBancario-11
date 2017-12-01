<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerMovimiento extends Migration
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

        CREATE TRIGGER tr_movimiento AFTER insert ON movimientos
        FOR EACH ROW BEGIN
                 if new.tipo="RETIRO" then
                      UPDATE cuentas SET saldo=saldo-new.monto,updated_at=now() WHERE id=new.id_cuenta;
                      UPDATE cajas SET total=total-new.monto,updated_at=now() WHERE id=new.id_caja;
                      INSERT INTO detalles( fecha, id_caja, monto, id_banco,detalle) 
                VALUES (now(),new.id_caja,-new.monto,new.id_banco,"Retiro de la cuenta "+new.id_cuenta);
                select saldo into @saldo from cuentas where id=new.id_cuenta;
                      
                INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"RETIRO",-new.monto,@saldo,"",new.id_cuenta,now(),now()); 
                 
                 elseif new.tipo="DEPOSITO" then
                         UPDATE cuentas SET saldo=saldo+new.monto,updated_at=now() WHERE id=new.id_cuenta;
                        UPDATE cajas SET total=total+new.monto,updated_at=now() WHERE id=new.id_caja;
                       INSERT INTO detalles( fecha, id_caja, monto, id_banco,detalle,created_at, updated_at) 
                VALUES (now(),new.id_caja,new.monto,new.id_banco,"Deposito en la cuenta "+new.id_cuenta,now(),now());
                select saldo into @saldo from cuentas where id=new.id_cuenta;
                      
                INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"DEPOSITO ",new.monto,@saldo,"",new.id_cuenta,now(),now()); 
                 end if;
                
        END

        ');*/
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
