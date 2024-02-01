<?php

namespace App\Imports;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class ContactsImport implements ToCollection
{

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //

        $user = Auth::user();
        foreach ($rows as $row)
        {

            if($row[0] == "Nom & Prénoms") {
                $depart = 1;
                continue;
            }

            if($depart) {
                Contact::create([
                    'nom' => $row[0],
                    'numero' => '+'.$row[1],
                    'user_id' => $user->id,
                ]);
            }

        }
    }
}
