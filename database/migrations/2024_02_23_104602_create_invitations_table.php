<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->string('receiver_email', 255);
            $table->enum('invitation_type', ['link'])->default('link');
            $table->timestamp('expiration_time')->nullable();
            $table->enum('status', ['pending'])->default('pending');
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}