<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;

class Products extends Component
{
    public $products, $title, $body, $product_id;

    public $isOpen = 0;

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }

     /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function create()

    {

        $this->resetInputFields();

        $this->openModal();

    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function openModal()

    {

        $this->isOpen = true;

    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function closeModal()

    {

        $this->isOpen = false;

    }

  

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    private function resetInputFields(){

        $this->name = '';

        $this->description = '';

        $this->ref = '';

        $this->price = '';

        $this->qte = '';
    }

     

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function store()

    {

        $this->validate([

            'name' => 'required',

            'description' => 'required',

            'price' => 'required',

            'ref' => 'required',

            'qte' => 'required',

        ]);

   

        Product::updateOrCreate(['id' => $this->product_id], [

            'name' => $this->name,

            'description' => $this->description,

            'ref' => $this->ref,

            'price' => $this->price,

            'qte' => $this->qte,

        ]);

  

        session()->flash('message', 

            $this->product_id ? 'Products Updated Successfully.' : 'Products Created Successfully.');

  

        $this->closeModal();

        $this->resetInputFields();

    }

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function edit($id)

    {

        $post = Product::findOrFail($id);

        $this->product_id = $id;

        $this->name = $post->name;

        $this->description = $post->description;
        
        $this->ref = $post->ref;

        $this->price = $post->price;

        $this->qte = $post->qte;

    

        $this->openModal();

    }

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function delete($id)

    {

        Product::find($id)->delete();

        session()->flash('message', 'Products Deleted Successfully.');

    }
}
