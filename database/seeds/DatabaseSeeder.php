<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        DB::table('USERS')->insert([
  			[	'EMAIL' => Hash::make('davidencina1996@gmail.com'),
  				'PASSWORD' => Hash::make('P@ssw0rd'),
  				'remember_token' => Str::random(60)
  			],
  			[	'EMAIL' => Hash::make('paco.cayuela13@gmail.com'),
  				'PASSWORD' => Hash::make('P@ssw0rd'),
  				'remember_token' => Str::random(60)
  			],
  			[	'EMAIL' => Hash::make('emieza@xtec.cat'),
  				'PASSWORD' => Hash::make('P@ssw0rd'),
  				'remember_token' => Str::random(60)
  			]
  		]);

        DB::table('CATEGORIES')->insert([
  			[	'NAME' => 'Fast Food'	],
  			[	'NAME' => 'Sushi'	],
  			[	'NAME' => 'Italiano'	],
  			[	'NAME' => 'Kebab'	],
  			[	'NAME' => 'Healthy'	],
  		]);

        DB::table('BUSINESSES')->insert([
  			[	'CATEGORY_ID' => 2,
  				'BUS_NAME' => 'Naru Sushi',
  				'BUS_DESCRIPTION' => 'Repartimos sushi a domicilio en Baix Llobregat, concretamente llegamos a Esplugues, Sant Just, Sant Boi, L’Hospitalet, Sant Joan Despí y Cornellá. En este último además ofrecemos sushi para llevar. ¡Os esperamos!',
  				'POSTAL_CODE' => '08940'
  			],
  			[	'CATEGORY_ID' => 1,
  				'BUS_NAME' => 'Burger King',
  				'BUS_DESCRIPTION' => '¿Tienes hambre? Tenemos lo que buscas!',
  				'POSTAL_CODE' => '08950'
  			],
  			[	'CATEGORY_ID' => 4,
  				'BUS_NAME' => 'Pita Kebab',
  				'BUS_DESCRIPTION' => 'Kebabs, Pizzas... Todo esto y mucho más es lo encontrarás en Pita Kebab. ¿Te vas a resistir?',
  				'POSTAL_CODE' => '08940'
  			],
  			[	'CATEGORY_ID' => 5,
  				'BUS_NAME' => 'GreenVita Healthy Kitchen',
  				'BUS_DESCRIPTION' => 'Alimentación más sana, equilibrada y natural. De agricultura responsable, con nutrientes y vitaminas esenciales. Con humildad, naturalidad y buenas maneras. Bueno para el paladar y para el cuerpo.',
  				'POSTAL_CODE' => '08940'
  			],
  		]);

        DB::table('ITEMS')->insert([
        	[	'BUS_ID' => 4,
        		'ITEM_NAME' => 'Trío de quinoa eco',
        		'ITEM_DESCRIPTION' => '5 lechugas, brócoli, tomate seco, naranja vinagreta tamarindo, semillas y especias "zaatar".',
        		'ITEM_PRICE' => 10.70,
        		'ITEM_STATUS' => 1
        	],
        	[	'BUS_ID' => 2,
        		'ITEM_NAME' => 'Tataki de atún con guacamole',
        		'ITEM_DESCRIPTION' => 'Tataki de atún con guacamole y reducción de vinagre de Módena con soja.',
        		'ITEM_PRICE' => 11.50,
        		'ITEM_STATUS' => 1
        	],
        	[	'BUS_ID' => 1,
        		'ITEM_NAME' => 'Menú Crispy Chicken',
        		'ITEM_DESCRIPTION' => 'Pan, mayonesa, lechuga, tomate, carne de pollo empanado más complemento y bebida.',
        		'ITEM_PRICE' => 7.20,
        		'ITEM_STATUS' => 1
        	],
        	[	'BUS_ID' => 3,
        		'ITEM_NAME' => 'Menú 6',
        		'ITEM_DESCRIPTION' => 'Bandeja de Kebab Mixto Grande',
        		'ITEM_PRICE' => 5.50,
        		'ITEM_STATUS' => 1
        	],
        ]);

         DB::table('EXTRAS')->insert([
          [ 'ITEM_ID' => 1,
            'EXTRA_NAME' => 'Medallón de queso de cabra ECO',
            'EXTRA_PRICE' => 1.50,
          ],
          [ 'ITEM_ID' => 2,
            'EXTRA_NAME' => 'Semillas de Chía',
            'EXTRA_PRICE' => 1.20,
          ],
          [ 'ITEM_ID' => 3,
            'EXTRA_NAME' => 'Bacon',
            'EXTRA_PRICE' => 1.10,
          ],
          [ 'ITEM_ID' => 4,
            'EXTRA_NAME' => 'Salchipapas',
            'EXTRA_PRICE' => 1.70,
          ],
        ]);
    }
}	