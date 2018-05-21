<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

trait Activeable
{
    /****************************************** HELPER *******************************************/

    public function toggleSingleActivation($entity_name)
    {
        if ($this->activated_at) {
            
            $this->update(['activated_at' => null]);

            return redirect()
                    ->back()
                    ->with('success-message', $entity_name . ' has been deactivated.')
                    ->send();
        }
        else {

            // Deactivate all other entities first
            $this::query()->update(['activated_at' => null]);

            // Activate only *this* entity
            $this->update(['activated_at' => Carbon::now()]);

            return redirect()
                    ->back()
                    ->with('success-message', $entity_name . ' has been activated.')
                    ->send();
        }
    }
}