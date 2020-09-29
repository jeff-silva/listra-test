<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $cars = [
            [
                'description' => 'Chevrolet Onix',
                'price' => '41965.00',
                'photo' => 'https://www.chevrolet.com.br/content/dam/chevrolet/mercosur/master/portuguese/index/cars/2019-onix/colorizer/01-images/1-novo-onix-branco-summit-mov-intro-02.png?imwidth=960',
            ],
            [
                'description' => 'Ford Ka',
                'price' => '36915.00',
                'photo' => 'https://quatrorodas.abril.com.br/wp-content/uploads/2018/02/ford-ka_plus-2019-1600-06.jpg?quality=70&strip=info',
            ],
            [
                'description' => 'Hyundai HB20',
                'price' => '41846.00',
                'photo' => 'https://catalogo.webmotors.com.br/imagens/prod/348309/HYUNDAI_HB20_1.0_TGDI_FLEX_SPORT_AUTOMATICO_34830915110557317.png?s=fill&w=440&h=330&q=80&t=true',
            ],
            [
                'description' => 'Renault Kwid',
                'price' => '29127.00',
                'photo' => 'https://cdn.group.renault.com/ren/br/renault-new-cars/product-plans/kwid/home-produto/2outsider.jpg.ximg.xsmall.jpg/1575392950682.jpg',
            ],
            [
                'description' => 'Chevrolet Prisma',
                'price' => '40636.00',
                'photo' => 'https://catalogo.webmotors.com.br/imagens/prod/346816/CHEVROLET_PRISMA_1.0_MPFI_JOY_8V_FLEX_4P_MANUAL_34681613581839314.png?s=fill&w=440&h=330&q=80&t=true',
            ],
            [
                'description' => 'Volkswagen Gol',
                'price' => '38861.00',
                'photo' => 'https://catalogo.webmotors.com.br/imagens/prod/347690/VOLKSWAGEN_GOL_1.0_12V_MPI_TOTALFLEX_4P_MANUAL_34769015562989444.png?s=fill&w=440&h=330&q=80&t=true',
            ],
            [
                'description' => 'Fiat Argo',
                'price' => '39588.00',
                'photo' => 'https://assets.website-files.com/5c4b6af93b460b2d2ec8e8e6/5d9e4168eb3f2af098d63242_consorcio_Argo.png',
            ],
        ];

        foreach($cars as $car) {
            DB::table('cars')->insert($car);
        }
    }
}
