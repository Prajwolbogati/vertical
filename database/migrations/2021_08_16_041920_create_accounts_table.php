<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('account_id');
            $table->string('domainname');
            $table->string('hostingquota');
            $table->string('fullname');
            $table->string('companyname');
            $table->string('companyaddress');
            $table->string('phone_num');
            $table->string('email');
            $table->string('marketby');
            $table->string('inputserver');
            $table->string('status');
            $table->integer('hosting_vat');
            $table->integer('domain_vat');
            $table->float('hosting_amount');
            $table->float('domain_amount');
            $table->float('hosting_finalamount');
            $table->float('domain_finalamount');
            $table->float('hosting_discount', 10,2);
            $table->float('domain_discount', 10,2);
            $table->date('hosting_active_date');
            $table->date('hosting_exp_date');
            $table->date('domain_active_date');
            $table->date('domain_exp_date');
            $table->longtext('detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
