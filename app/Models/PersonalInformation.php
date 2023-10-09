<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'passport_no',
        'passport_expiry_date',
        'tel',
        'nationality',
        'religion',
        'marital_status',
        'employment_of_spouse',
        'children',
        'hometown',
        'birthcert',
        'ssnit',
        'maritalDate',
        'comment'

    ];


   // Function to track updated columns
   public function trackUpdatedColumns(array $updatedData)
   {
       $updatedColumns = [];

       foreach ($updatedData as $key => $value) {
           // Check if the new value is different from the original value
           if ($this->getAttribute($key) !== $value) {
               $updatedColumns[$key] = [
                   'old' => $this->getAttribute($key),
                   'new' => $value,
               ];
           }
       }

       return $updatedColumns;
   }


}
