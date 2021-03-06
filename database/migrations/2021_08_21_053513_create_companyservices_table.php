<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCompanyservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyservices', function (Blueprint $table) {
            $table->increments('compservice_id');
            $table->integer('account_id')->unsigned()->nullable();
            $table->foreign('account_id')->references('account_id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('service_id')->on('services')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status');
            $table->integer('vat_amount');
            $table->float('amount');
            $table->float('amountafterdiscount')->nullable();
            $table->float('finalamount');
            $table->float('discount', 10,2)->nullable();
            $table->date('active_date');
            $table->date('exp_date');
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
        Schema::dropIfExists('companyservices');
    }
}
