<?php

namespace Tests\Helper\Utils;

use ReflectionClass;

/**
 * Reflectionクラスのtest用wrapper_trait
 *
 * 第一引数にアクセスしたいインスタンスを渡すこと
 *
 * テスト用途のみで使用すること
 * 使い方次第では、本来アクセスできないメソッドを呼び出せてしまう
 */
trait CanReferUnaccessible
{
    /** @var array 内部にReflectionClassを保持する. test中同じインスタンスを使い回すために使用する */
    private $reflection_instances = [];

    /**
     * protected,privateメソッドをリフレクションを用いて読み出す
     * 引数が必要なメソッドの場合、配列に入れて渡す
     *
     * @param object $original_instance リフレクション元のオリジナルクラス
     * @param string $method_name
     * @param array  $args
     * @return mixed
     */
    public function runUnaccessibleMethod(
        object $original_instance,
        string $method_name,
        array $args = []
    ) {
        $reflection = $this->buildOrReuseReflectionInstance($original_instance);
        $method = $reflection->getMethod($method_name);
        $method->setAccessible(true);
        return $method->invokeArgs($original_instance, $args);
    }

    /**
     * 1つの指定したprotected,privateプロパティをリフレクションを用いて読み出す
     *
     * @param object $original_instanceリフレクション元のオリジナルクラス
     * @param string $property_name
     * @return mixed
     */
    public function getUnaccessibleProperty($original_instance, string $property_name)
    {
        $reflection = $this->buildOrReuseReflectionInstance($original_instance);
        $property = $reflection->getProperty($property_name);
        $property->setAccessible(true);
        return $property->getValue($original_instance);
    }

    /**
     * 指定した任意の数のprotected,privateプロパティをリフレクションを用いてすべて取得する
     *
     * @param object $original_instance リフレクション元のオリジナルクラス
     * @param array  $property_names キー名を格納した配列
     * @return array
     */
    public function getUnaccessibleProperties($original_instance, array $property_names): array
    {
        $array = [];
        foreach ($property_names as $name) {
            $array[$name] = $this->getUnaccessibleProperty($original_instance, $name);
        }
        return $array;
    }

    /**
     * setter. 内部使用のみを想定
     *
     * @param ReflectionClass $reflection
     * @return void
     */
    private function setReflectionInstance(ReflectionClass $reflection): void
    {
        $this->reflection_instances[$reflection->getName()] = $reflection;
    }

    /**
     * ReflectionClassを取得する
     * 既にsetされている場合はそのインスタンスを使い回す
     * setされていない場合は次回以降使い回すためプロパティに格納する
     *
     * @param  object $original_instance
     * @return ReflectionClass
     */
    private function buildOrReuseReflectionInstance($original_instance): ReflectionClass
    {
        $reflection = $this->reflection_instances[get_class($original_instance)] ?? null;
        if (is_null($reflection)) {
            $reflection = new ReflectionClass($original_instance);
            $this->setReflectionInstance($reflection);
        }
        return $reflection;
    }
}
