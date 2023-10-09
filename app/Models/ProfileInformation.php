<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'birth_date',
        'gender',
        'address',
        'state',
        'country',
        'pin_code',
        'phone_number',
        'department',
        'designation',
        'reports_to',
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
