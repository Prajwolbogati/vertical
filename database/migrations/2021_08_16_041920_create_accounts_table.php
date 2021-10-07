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
            $table->bigIncrements('account_id');
            $table->string('domainname')->unique();
            $table->string('hostingquota')->nullable();
            $table->string('fullname');
            $table->string('companyname');
            $table->string('companyaddress');
            $table->string('phone_num');
            $table->string('email')->unique();
            $table->string('marketby')->nullable();
            $table->longtext('detail')->nullable();
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
