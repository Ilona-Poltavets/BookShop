<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class BasketController extends Controller
{
    private $basket;

    public function __construct()
    {
        $this->getBasket();
    }

    /**
     * Показывает корзину покупателя
     */
    public function index()
    {
        $books = $this->basket->books;
        return view('basket.index', compact('books'));
    }

    /**
     * Форма оформления заказа
     */
    public function checkout()
    {
        $books = $this->basket->books;
        return view('basket.checkout', compact('books'));
    }

    /**
     * Добавляет товар с идентификатором $id в корзину
     */
    public function add(Request $request, $id)
    {
        $quantity = $request->input('quantity') ?? 1;
        $this->basket->increase($id, $quantity);
        // выполняем редирект обратно на ту страницу,
        // где была нажата кнопка «В корзину»
        return back();
    }

    /**
     * Увеличивает кол-во товара $id в корзине на единицу
     */
    public function plus($id)
    {
        $this->basket->increase($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Уменьшает кол-во товара $id в корзине на единицу
     */
    public function minus($id)
    {
        $this->basket->decrease($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Возвращает объект корзины; если не найден — создает новый
     */
    private function getBasket()
    {
        $basket_id = Cookie::get('basket_id');

        if (!empty($basket_id)) {
            try {
                $this->basket = Basket::findOrFail($basket_id);
            } catch (ModelNotFoundException $e) {
                $this->basket = Basket::create();
            }
        } else {
            $this->basket = Basket::create();
        }
        Cookie::queue('basket_id', $this->basket->id);
    }

    public function remove($id)
    {
        $this->basket->remove($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Полностью очищает содержимое корзины покупателя
     */
    public function clear()
    {
        $this->basket->delete();
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }
}
