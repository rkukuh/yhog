<?php

use Illuminate\Database\Seeder;

class ExampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** USER, ROLE, PERMISSION */

        $this->call(Users::class);

        /** POLYMORPHICS **/

        $this->call(Tags::class);
        $this->call(Images::class);
        $this->call(Categories::class);
        
        /** BLOG **/
        
        $this->call(Posts::class);

        /** PARTNER **/

        $this->call(Partners::class);

        /** EVENT **/

        $this->call(Events::class);

        /** DONATION **/

        $this->call(Donations::class);
        $this->call(Donates::class);

        /** GALLERY **/

        $this->call(Galleries::class);

        /** ADVERTISEMENT **/

        $this->call(Advertisements::class);
    }
}
