<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\FiboRepository;

class FiboService
{
    private FiboRepository $fiboRepository;

    public function __construct()
    {
        $this->fiboRepository = app(FiboRepository::class);
    }

    /**
     * @param Request $request
     * @return array|string[]
     * @throws Exception
     */
    public function calckFibo(Request $request): array
    {
        $fibo = $request->fibo;
        $value = $this->calck($request->fibo);

        if (!$this->fiboRepository->createFibo($fibo, $value)) {
            throw new Exception('Ошибка создание записи в БД');
        }

        return ['value' => $value];
    }

    /**
     * @param int $n
     * @return mixed
     */
    protected function calck(int $n): string
    {
        $a = 1;
        $b = $n == 0 ? 0 : 1;
        for ($i = 3; $i <= $n; $i++) {
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }

        return $b;
    }
}
