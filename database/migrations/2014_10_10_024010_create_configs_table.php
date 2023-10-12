<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prog_name')->unique();
            $table->string('father')->default('Root');
            $table->boolean('isMain')->default(true);
            $table->boolean('status')->default(true);

            $table->timestamps();

        });

        \App\Models\Config::create( [
            'name' => 'Root',
            'status' => false,
            'prog_name'=>'SystemPro',

        ]);
        //----------- Level 1 -------------------
        \App\Models\Config::create( [
            'name' => 'Roles',
            'status' => true,
            'prog_name'=>'RolesPro',
            'father' =>'Root',
        ]);
        \App\Models\Config::create( [
            'name' => 'Room Types',
            'status' => true,
            'prog_name'=>'RoomTypesPro',
            'father' =>'Root',
        ]);
        \App\Models\Config::create( [
            'name' => 'Room Status',
            'status' => true,
            'prog_name'=>'RoomStatusPro',
            'father' =>'Root',
        ]);
        \App\Models\Config::create( [
            'name' => 'Booking Status',
            'status' => true,
            'prog_name'=>'BookingStatusPro',
            'father' =>'Root',
        ]);
        \App\Models\Config::create( [
            'name' => 'Job Request Status',
            'status' => true,
            'prog_name'=>'JobRequestStatusPro',
            'father' =>'Root',
        ]);

        //------------ level 2 --------------------
            //------------- Roles---------------

                \App\Models\Config::create( [
                    'name' => 'Admin',
                    'status' => true,
                    'prog_name'=>'RoleAdminPro',
                    'father' => 'RolesPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'Employee',
                    'status' => true,
                    'prog_name'=>'RoleEmployeePro',
                    'father' => 'RolesPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'User',
                    'status' => true,
                    'prog_name'=>'RoleUserPro',
                    'father' => 'RolesPro',
                ]);
            //--------------- Room Types -------------
                \App\Models\Config::create( [
                    'name' => 'Single',
                    'status' => true,
                    'prog_name'=>'RoomTypeSinglePro',
                    'father' => 'RoomTypesPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'Double',
                    'status' => true,
                    'prog_name'=>'RoomTypeDoublePro',
                    'father' => 'RoomTypesPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'Suite',
                    'status' => true,
                    'prog_name'=>'RoomTypeSuitePro',
                    'father' => 'RoomTypesPro',
                ]);
            //--------------- Room Status -------------
                \App\Models\Config::create( [
                    'name' => 'Available',
                    'status' => true,
                    'prog_name'=>'RoomStatusAvailablePro',
                    'father' => 'RoomStatusPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'Booked',
                    'status' => true,
                    'prog_name'=>'RoomStatusBookedPro',
                    'father' => 'RoomStatusPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'Pending',
                    'status' => true,
                    'prog_name'=>'RoomStatusPendingPro',
                    'father' => 'RoomStatusPro',
                ]);
            //--------------- Booking Status -------------
                \App\Models\Config::create( [
                    'name' => 'approved',
                    'status' => true,
                    'prog_name'=>'BookingStatusApprovedPro',
                    'father' => 'BookingStatusPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'rejected',
                    'status' => true,
                    'prog_name'=>'BookingStatusRejectedPro',
                    'father' => 'BookingStatusPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'Pending',
                    'status' => true,
                    'prog_name'=>'BookingStatusPendingPro',
                    'father' => 'BookingStatusPro',
                ]);
            //--------------- Job Request Status -------------
                \App\Models\Config::create( [
                    'name' => 'submitted',
                    'status' => true,
                    'prog_name'=>'JobStatusSubmittedPro',
                    'father' => 'JobRequestStatusPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'rejected',
                    'status' => true,
                    'prog_name'=>'JobStatusRejectedPro',
                    'father' => 'JobRequestStatusPro',
                ]);
                \App\Models\Config::create( [
                    'name' => 'accepted',
                    'status' => true,
                    'prog_name'=>'JobStatusAcceptedPro',
                    'father' => 'JobRequestStatusPro',
                ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
