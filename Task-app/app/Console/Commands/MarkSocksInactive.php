<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Carbon\Carbon;
class MarkSocksInactive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:mark-socks-inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark products as inactive if category is "Socks" and they were created more than 2 years ago.';

    /**
     * Execute the console command.
     *    * @return void
     */
    public function handle()
    {
         // Get the current date minus 2 years
         $twoYearsAgo = Carbon::now()->subYears(2);

         // Query products that belong to the "Socks" category and are older than 2 years
         $products = Product::where('category_id', function ($query) {
             $query->select('id')
                 ->from('products_categories')
                 ->where('name', 'Socks');
         })
         ->where('created_at', '<', $twoYearsAgo)
         ->get();
 
         // Loop through each product and mark it as inactive
         foreach ($products as $product) {
             $product->update([
                 'active' => false
             ]);
 
             $this->info('Product ID ' . $product->id . ' marked as inactive.');
         }
 
         if ($products->isEmpty()) {
             $this->info('No products found matching the criteria.');
         }
     }
 }
    