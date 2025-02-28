<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Cache\Traits;

use Symfony\Component\VarExporter\LazyObjectInterface;
use Symfony\Component\VarExporter\LazyProxyTrait;
use Symfony\Contracts\Service\ResetInterface;

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

/**
 * @internal
 */
class Redis6Proxy extends \Redis implements ResetInterface, LazyObjectInterface
{
    use LazyProxyTrait {
        resetLazyObject as reset;
    }

    private int $lazyObjectId;
    private \Redis $lazyObjectReal;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        'lazyObjectReal' => [self::class, 'lazyObjectReal', null],
        "\0".self::class."\0lazyObjectReal" => [self::class, 'lazyObjectReal', null],
    ];

    public function __construct($options = null)
    {
        return $this->lazyObjectReal->__construct(...\func_get_args());
    }

    public function _compress($value): string
    {
        return $this->lazyObjectReal->_compress(...\func_get_args());
    }

    public function _pack($value): string
    {
        return $this->lazyObjectReal->_pack(...\func_get_args());
    }

    public function _prefix($key): string
    {
        return $this->lazyObjectReal->_prefix(...\func_get_args());
    }

    public function _serialize($value): string
    {
        return $this->lazyObjectReal->_serialize(...\func_get_args());
    }

    public function _uncompress($value): string
    {
        return $this->lazyObjectReal->_uncompress(...\func_get_args());
    }

    public function _unpack($value): mixed
    {
        return $this->lazyObjectReal->_unpack(...\func_get_args());
    }

    public function _unserialize($value): mixed
    {
        return $this->lazyObjectReal->_unserialize(...\func_get_args());
    }

    public function acl($subcmd, ...$args)
    {
        return $this->lazyObjectReal->acl(...\func_get_args());
    }

    public function append($key, $value)
    {
        return $this->lazyObjectReal->append(...\func_get_args());
    }

    public function auth(#[\SensitiveParameter] $credentials): bool
    {
        return $this->lazyObjectReal->auth(...\func_get_args());
    }

    public function bgSave(): bool
    {
        return $this->lazyObjectReal->bgSave(...\func_get_args());
    }

    public function bgrewriteaof(): bool
    {
        return $this->lazyObjectReal->bgrewriteaof(...\func_get_args());
    }

    public function bitcount($key, $start = 0, $end = -1, $bybit = false)
    {
        return $this->lazyObjectReal->bitcount(...\func_get_args());
    }

    public function bitop($operation, $deskey, $srckey, ...$other_keys): int
    {
        return $this->lazyObjectReal->bitop(...\func_get_args());
    }

    public function bitpos($key, $bit, $start = 0, $end = -1)
    {
        return $this->lazyObjectReal->bitpos(...\func_get_args());
    }

    public function blPop($key, $timeout_or_key, ...$extra_args): array
    {
        return $this->lazyObjectReal->blPop(...\func_get_args());
    }

    public function brPop($key, $timeout_or_key, ...$extra_args): array
    {
        return $this->lazyObjectReal->brPop(...\func_get_args());
    }

    public function brpoplpush($src, $dst, $timeout): string
    {
        return $this->lazyObjectReal->brpoplpush(...\func_get_args());
    }

    public function bzPopMax($key, $timeout_or_key, ...$extra_args): array
    {
        return $this->lazyObjectReal->bzPopMax(...\func_get_args());
    }

    public function bzPopMin($key, $timeout_or_key, ...$extra_args): array
    {
        return $this->lazyObjectReal->bzPopMin(...\func_get_args());
    }

    public function clearLastError(): bool
    {
        return $this->lazyObjectReal->clearLastError(...\func_get_args());
    }

    public function client($opt, ...$args): mixed
    {
        return $this->lazyObjectReal->client(...\func_get_args());
    }

    public function close(): bool
    {
        return $this->lazyObjectReal->close(...\func_get_args());
    }

    public function command($opt, $arg): mixed
    {
        return $this->lazyObjectReal->command(...\func_get_args());
    }

    public function config($operation, $key, $value = null): mixed
    {
        return $this->lazyObjectReal->config(...\func_get_args());
    }

    public function connect($host, $port = 6379, $timeout = 0.0, $persistent_id = null, $retry_interval = 0, $read_timeout = 0.0, $context = null): bool
    {
        return $this->lazyObjectReal->connect(...\func_get_args());
    }

    public function copy($src, $dst, $options = null): bool
    {
        return $this->lazyObjectReal->copy(...\func_get_args());
    }

    public function dbSize(): int
    {
        return $this->lazyObjectReal->dbSize(...\func_get_args());
    }

    public function debug($key): string
    {
        return $this->lazyObjectReal->debug(...\func_get_args());
    }

    public function decr($key)
    {
        return $this->lazyObjectReal->decr(...\func_get_args());
    }

    public function decrBy($key, $value)
    {
        return $this->lazyObjectReal->decrBy(...\func_get_args());
    }

    public function del($key, ...$other_keys)
    {
        return $this->lazyObjectReal->del(...\func_get_args());
    }

    public function delete($key, ...$other_keys)
    {
        return $this->lazyObjectReal->delete(...\func_get_args());
    }

    public function discard(): bool
    {
        return $this->lazyObjectReal->discard(...\func_get_args());
    }

    public function dump($key): string
    {
        return $this->lazyObjectReal->dump(...\func_get_args());
    }

    public function echo($str)
    {
        return $this->lazyObjectReal->echo(...\func_get_args());
    }

    public function eval($script, $keys = null, $num_keys = 0): mixed
    {
        return $this->lazyObjectReal->eval(...\func_get_args());
    }

    public function evalsha($sha1, $keys = null, $num_keys = 0): mixed
    {
        return $this->lazyObjectReal->evalsha(...\func_get_args());
    }

    public function exec(): array
    {
        return $this->lazyObjectReal->exec(...\func_get_args());
    }

    public function exists($key)
    {
        return $this->lazyObjectReal->exists(...\func_get_args());
    }

    public function expire($key, $timeout): bool
    {
        return $this->lazyObjectReal->expire(...\func_get_args());
    }

    public function expireAt($key, $timestamp): bool
    {
        return $this->lazyObjectReal->expireAt(...\func_get_args());
    }

    public function failover($to = null, $abort = false, $timeout = 0): bool
    {
        return $this->lazyObjectReal->failover(...\func_get_args());
    }

    public function flushAll($sync = null): bool
    {
        return $this->lazyObjectReal->flushAll(...\func_get_args());
    }

    public function flushDB($sync = null): bool
    {
        return $this->lazyObjectReal->flushDB(...\func_get_args());
    }

    public function geoadd($key, $lng, $lat, $member, ...$other_triples): int
    {
        return $this->lazyObjectReal->geoadd(...\func_get_args());
    }

    public function geodist($key, $src, $dst, $unit = null): array
    {
        return $this->lazyObjectReal->geodist(...\func_get_args());
    }

    public function geohash($key, $member, ...$other_members): array
    {
        return $this->lazyObjectReal->geohash(...\func_get_args());
    }

    public function geopos($key, $member, ...$other_members): array
    {
        return $this->lazyObjectReal->geopos(...\func_get_args());
    }

    public function georadius($key, $lng, $lat, $radius, $unit, $options = []): array
    {
        return $this->lazyObjectReal->georadius(...\func_get_args());
    }

    public function georadius_ro($key, $lng, $lat, $radius, $unit, $options = []): array
    {
        return $this->lazyObjectReal->georadius_ro(...\func_get_args());
    }

    public function georadiusbymember($key, $member, $radius, $unit, $options = []): array
    {
        return $this->lazyObjectReal->georadiusbymember(...\func_get_args());
    }

    public function georadiusbymember_ro($key, $member, $radius, $unit, $options = []): array
    {
        return $this->lazyObjectReal->georadiusbymember_ro(...\func_get_args());
    }

    public function geosearch($key, $position, $shape, $unit, $options = []): array
    {
        return $this->lazyObjectReal->geosearch(...\func_get_args());
    }

    public function geosearchstore($dst, $src, $position, $shape, $unit, $options = []): array
    {
        return $this->lazyObjectReal->geosearchstore(...\func_get_args());
    }

    public function get($key)
    {
        return $this->lazyObjectReal->get(...\func_get_args());
    }

    public function getAuth(): mixed
    {
        return $this->lazyObjectReal->getAuth(...\func_get_args());
    }

    public function getBit($key, $idx)
    {
        return $this->lazyObjectReal->getBit(...\func_get_args());
    }

    public function getEx($key, $options = []): bool|string
    {
        return $this->lazyObjectReal->getEx(...\func_get_args());
    }

    public function getDBNum(): int
    {
        return $this->lazyObjectReal->getDBNum(...\func_get_args());
    }

    public function getDel($key): bool|string
    {
        return $this->lazyObjectReal->getDel(...\func_get_args());
    }

    public function getHost(): string
    {
        return $this->lazyObjectReal->getHost(...\func_get_args());
    }

    public function getLastError(): ?string
    {
        return $this->lazyObjectReal->getLastError(...\func_get_args());
    }

    public function getMode(): int
    {
        return $this->lazyObjectReal->getMode(...\func_get_args());
    }

    public function getOption($option): mixed
    {
        return $this->lazyObjectReal->getOption(...\func_get_args());
    }

    public function getPersistentID(): ?string
    {
        return $this->lazyObjectReal->getPersistentID(...\func_get_args());
    }

    public function getPort(): int
    {
        return $this->lazyObjectReal->getPort(...\func_get_args());
    }

    public function getRange($key, $start, $end)
    {
        return $this->lazyObjectReal->getRange(...\func_get_args());
    }

    public function getReadTimeout(): int
    {
        return $this->lazyObjectReal->getReadTimeout(...\func_get_args());
    }

    public function getset($key, $value)
    {
        return $this->lazyObjectReal->getset(...\func_get_args());
    }

    public function getTimeout(): int
    {
        return $this->lazyObjectReal->getTimeout(...\func_get_args());
    }

    public function hDel($key, $member, ...$other_members): int
    {
        return $this->lazyObjectReal->hDel(...\func_get_args());
    }

    public function hExists($key, $member): bool
    {
        return $this->lazyObjectReal->hExists(...\func_get_args());
    }

    public function hGet($key, $member): string
    {
        return $this->lazyObjectReal->hGet(...\func_get_args());
    }

    public function hGetAll($key): array
    {
        return $this->lazyObjectReal->hGetAll(...\func_get_args());
    }

    public function hIncrBy($key, $member, $value): int
    {
        return $this->lazyObjectReal->hIncrBy(...\func_get_args());
    }

    public function hIncrByFloat($key, $member, $value): float
    {
        return $this->lazyObjectReal->hIncrByFloat(...\func_get_args());
    }

    public function hKeys($key): array
    {
        return $this->lazyObjectReal->hKeys(...\func_get_args());
    }

    public function hLen($key): int
    {
        return $this->lazyObjectReal->hLen(...\func_get_args());
    }

    public function hMget($key, $keys): array
    {
        return $this->lazyObjectReal->hMget(...\func_get_args());
    }

    public function hMset($key, $keyvals): bool
    {
        return $this->lazyObjectReal->hMset(...\func_get_args());
    }

    public function hRandField($key, $options = null): array|string
    {
        return $this->lazyObjectReal->hRandField(...\func_get_args());
    }

    public function hSet($key, $member, $value): int
    {
        return $this->lazyObjectReal->hSet(...\func_get_args());
    }

    public function hSetNx($key, $member, $value): int
    {
        return $this->lazyObjectReal->hSetNx(...\func_get_args());
    }

    public function hStrLen($key, $member): int
    {
        return $this->lazyObjectReal->hStrLen(...\func_get_args());
    }

    public function hVals($key): array
    {
        return $this->lazyObjectReal->hVals(...\func_get_args());
    }

    public function hscan($key, &$iterator, $pattern = null, $count = 0): array|bool
    {
        return $this->lazyObjectReal->hscan(...\func_get_args());
    }

    public function incr($key)
    {
        return $this->lazyObjectReal->incr(...\func_get_args());
    }

    public function incrBy($key, $value)
    {
        return $this->lazyObjectReal->incrBy(...\func_get_args());
    }

    public function incrByFloat($key, $value)
    {
        return $this->lazyObjectReal->incrByFloat(...\func_get_args());
    }

    public function info($opt = null): array
    {
        return $this->lazyObjectReal->info(...\func_get_args());
    }

    public function isConnected(): bool
    {
        return $this->lazyObjectReal->isConnected(...\func_get_args());
    }

    public function keys($pattern)
    {
        return $this->lazyObjectReal->keys(...\func_get_args());
    }

    public function lInsert($key, $pos, $pivot, $value)
    {
        return $this->lazyObjectReal->lInsert(...\func_get_args());
    }

    public function lLen($key): int
    {
        return $this->lazyObjectReal->lLen(...\func_get_args());
    }

    public function lMove($src, $dst, $wherefrom, $whereto): string
    {
        return $this->lazyObjectReal->lMove(...\func_get_args());
    }

    public function lPop($key, $count = 0): array|bool|string
    {
        return $this->lazyObjectReal->lPop(...\func_get_args());
    }

    public function lPos($key, $value, $options = null): array|bool|int
    {
        return $this->lazyObjectReal->lPos(...\func_get_args());
    }

    public function lPush($key, ...$elements)
    {
        return $this->lazyObjectReal->lPush(...\func_get_args());
    }

    public function rPush($key, ...$elements)
    {
        return $this->lazyObjectReal->rPush(...\func_get_args());
    }

    public function lPushx($key, $value)
    {
        return $this->lazyObjectReal->lPushx(...\func_get_args());
    }

    public function rPushx($key, $value)
    {
        return $this->lazyObjectReal->rPushx(...\func_get_args());
    }

    public function lSet($key, $index, $value): bool
    {
        return $this->lazyObjectReal->lSet(...\func_get_args());
    }

    public function lastSave(): int
    {
        return $this->lazyObjectReal->lastSave(...\func_get_args());
    }

    public function lindex($key, $index): string
    {
        return $this->lazyObjectReal->lindex(...\func_get_args());
    }

    public function lrange($key, $start, $end): array
    {
        return $this->lazyObjectReal->lrange(...\func_get_args());
    }

    public function lrem($key, $value, $count = 0): bool
    {
        return $this->lazyObjectReal->lrem(...\func_get_args());
    }

    public function ltrim($key, $start, $end): bool
    {
        return $this->lazyObjectReal->ltrim(...\func_get_args());
    }

    public function mget($keys)
    {
        return $this->lazyObjectReal->mget(...\func_get_args());
    }

    public function migrate($host, $port, $key, $dst, $timeout, $copy = false, $replace = false): bool
    {
        return $this->lazyObjectReal->migrate(...\func_get_args());
    }

    public function move($key, $index): bool
    {
        return $this->lazyObjectReal->move(...\func_get_args());
    }

    public function mset($key_values): bool
    {
        return $this->lazyObjectReal->mset(...\func_get_args());
    }

    public function msetnx($key_values): int
    {
        return $this->lazyObjectReal->msetnx(...\func_get_args());
    }

    public function multi($value = \Redis::MULTI): \Redis|bool
    {
        return $this->lazyObjectReal->multi(...\func_get_args());
    }

    public function object($subcommand, $key): int|string
    {
        return $this->lazyObjectReal->object(...\func_get_args());
    }

    public function open($host, $port = 6379, $timeout = 0.0, $persistent_id = null, $retry_interval = 0, $read_timeout = 0.0, $context = null): bool
    {
        return $this->lazyObjectReal->open(...\func_get_args());
    }

    public function pconnect($host, $port = 6379, $timeout = 0.0, $persistent_id = null, $retry_interval = 0, $read_timeout = 0.0, $context = null): bool
    {
        return $this->lazyObjectReal->pconnect(...\func_get_args());
    }

    public function persist($key): bool
    {
        return $this->lazyObjectReal->persist(...\func_get_args());
    }

    public function pexpire($key, $timeout): bool
    {
        return $this->lazyObjectReal->pexpire(...\func_get_args());
    }

    public function pexpireAt($key, $timestamp): bool
    {
        return $this->lazyObjectReal->pexpireAt(...\func_get_args());
    }

    public function pfadd($key, $elements): int
    {
        return $this->lazyObjectReal->pfadd(...\func_get_args());
    }

    public function pfcount($key): int
    {
        return $this->lazyObjectReal->pfcount(...\func_get_args());
    }

    public function pfmerge($dst, $keys): bool
    {
        return $this->lazyObjectReal->pfmerge(...\func_get_args());
    }

    public function ping($key = null)
    {
        return $this->lazyObjectReal->ping(...\func_get_args());
    }

    public function pipeline(): \Redis|bool
    {
        return $this->lazyObjectReal->pipeline(...\func_get_args());
    }

    public function popen($host, $port = 6379, $timeout = 0.0, $persistent_id = null, $retry_interval = 0, $read_timeout = 0.0, $context = null): bool
    {
        return $this->lazyObjectReal->popen(...\func_get_args());
    }

    public function psetex($key, $expire, $value)
    {
        return $this->lazyObjectReal->psetex(...\func_get_args());
    }

    public function psubscribe($patterns, $cb): bool
    {
        return $this->lazyObjectReal->psubscribe(...\func_get_args());
    }

    public function pttl($key): int
    {
        return $this->lazyObjectReal->pttl(...\func_get_args());
    }

    public function publish($channel, $message): int
    {
        return $this->lazyObjectReal->publish(...\func_get_args());
    }

    public function pubsub($command, $arg = null): mixed
    {
        return $this->lazyObjectReal->pubsub(...\func_get_args());
    }

    public function punsubscribe($patterns): array|bool
    {
        return $this->lazyObjectReal->punsubscribe(...\func_get_args());
    }

    public function rPop($key, $count = 0): array|bool|string
    {
        return $this->lazyObjectReal->rPop(...\func_get_args());
    }

    public function randomKey()
    {
        return $this->lazyObjectReal->randomKey(...\func_get_args());
    }

    public function rawcommand($command, ...$args): mixed
    {
        return $this->lazyObjectReal->rawcommand(...\func_get_args());
    }

    public function rename($key_src, $key_dst)
    {
        return $this->lazyObjectReal->rename(...\func_get_args());
    }

    public function renameNx($key_src, $key_dst)
    {
        return $this->lazyObjectReal->renameNx(...\func_get_args());
    }

    public function restore($key, $timeout, $value): bool
    {
        return $this->lazyObjectReal->restore(...\func_get_args());
    }

    public function role(): mixed
    {
        return $this->lazyObjectReal->role(...\func_get_args());
    }

    public function rpoplpush($src, $dst): string
    {
        return $this->lazyObjectReal->rpoplpush(...\func_get_args());
    }

    public function sAdd($key, $value, ...$other_values): int
    {
        return $this->lazyObjectReal->sAdd(...\func_get_args());
    }

    public function sAddArray($key, $values): int
    {
        return $this->lazyObjectReal->sAddArray(...\func_get_args());
    }

    public function sDiff($key, ...$other_keys): array
    {
        return $this->lazyObjectReal->sDiff(...\func_get_args());
    }

    public function sDiffStore($dst, $key, ...$other_keys): int
    {
        return $this->lazyObjectReal->sDiffStore(...\func_get_args());
    }

    public function sInter($key, ...$other_keys): array
    {
        return $this->lazyObjectReal->sInter(...\func_get_args());
    }

    public function sInterStore($dst, $key, ...$other_keys): int
    {
        return $this->lazyObjectReal->sInterStore(...\func_get_args());
    }

    public function sMembers($key): array
    {
        return $this->lazyObjectReal->sMembers(...\func_get_args());
    }

    public function sMisMember($key, $member, ...$other_members): array
    {
        return $this->lazyObjectReal->sMisMember(...\func_get_args());
    }

    public function sMove($src, $dst, $value): bool
    {
        return $this->lazyObjectReal->sMove(...\func_get_args());
    }

    public function sPop($key, $count = 0): array|string
    {
        return $this->lazyObjectReal->sPop(...\func_get_args());
    }

    public function sRandMember($key, $count = 0): array|string
    {
        return $this->lazyObjectReal->sRandMember(...\func_get_args());
    }

    public function sUnion($key, ...$other_keys): array
    {
        return $this->lazyObjectReal->sUnion(...\func_get_args());
    }

    public function sUnionStore($dst, $key, ...$other_keys): int
    {
        return $this->lazyObjectReal->sUnionStore(...\func_get_args());
    }

    public function save(): bool
    {
        return $this->lazyObjectReal->save(...\func_get_args());
    }

    public function scan(&$iterator, $pattern = null, $count = 0): array
    {
        return $this->lazyObjectReal->scan(...\func_get_args());
    }

    public function scard($key): int
    {
        return $this->lazyObjectReal->scard(...\func_get_args());
    }

    public function script($command, ...$args): mixed
    {
        return $this->lazyObjectReal->script(...\func_get_args());
    }

    public function select($db): bool
    {
        return $this->lazyObjectReal->select(...\func_get_args());
    }

    public function set($key, $value, $opt = null)
    {
        return $this->lazyObjectReal->set(...\func_get_args());
    }

    public function setBit($key, $idx, $value)
    {
        return $this->lazyObjectReal->setBit(...\func_get_args());
    }

    public function setRange($key, $start, $value)
    {
        return $this->lazyObjectReal->setRange(...\func_get_args());
    }

    public function setOption($option, $value): bool
    {
        return $this->lazyObjectReal->setOption(...\func_get_args());
    }

    public function setex($key, $expire, $value)
    {
        return $this->lazyObjectReal->setex(...\func_get_args());
    }

    public function setnx($key, $value)
    {
        return $this->lazyObjectReal->setnx(...\func_get_args());
    }

    public function sismember($key, $value): bool
    {
        return $this->lazyObjectReal->sismember(...\func_get_args());
    }

    public function slaveof($host = null, $port = 6379): bool
    {
        return $this->lazyObjectReal->slaveof(...\func_get_args());
    }

    public function slowlog($mode, $option = 0): mixed
    {
        return $this->lazyObjectReal->slowlog(...\func_get_args());
    }

    public function sort($key, $options = null): mixed
    {
        return $this->lazyObjectReal->sort(...\func_get_args());
    }

    public function sortAsc($key, $pattern = null, $get = null, $offset = -1, $count = -1, $store = null): array
    {
        return $this->lazyObjectReal->sortAsc(...\func_get_args());
    }

    public function sortAscAlpha($key, $pattern = null, $get = null, $offset = -1, $count = -1, $store = null): array
    {
        return $this->lazyObjectReal->sortAscAlpha(...\func_get_args());
    }

    public function sortDesc($key, $pattern = null, $get = null, $offset = -1, $count = -1, $store = null): array
    {
        return $this->lazyObjectReal->sortDesc(...\func_get_args());
    }

    public function sortDescAlpha($key, $pattern = null, $get = null, $offset = -1, $count = -1, $store = null): array
    {
        return $this->lazyObjectReal->sortDescAlpha(...\func_get_args());
    }

    public function srem($key, $value, ...$other_values): int
    {
        return $this->lazyObjectReal->srem(...\func_get_args());
    }

    public function sscan($key, &$iterator, $pattern = null, $count = 0): array
    {
        return $this->lazyObjectReal->sscan(...\func_get_args());
    }

    public function strlen($key)
    {
        return $this->lazyObjectReal->strlen(...\func_get_args());
    }

    public function subscribe($channels, $cb): bool
    {
        return $this->lazyObjectReal->subscribe(...\func_get_args());
    }

    public function swapdb($src, $dst): bool
    {
        return $this->lazyObjectReal->swapdb(...\func_get_args());
    }

    public function time(): array
    {
        return $this->lazyObjectReal->time(...\func_get_args());
    }

    public function ttl($key): int
    {
        return $this->lazyObjectReal->ttl(...\func_get_args());
    }

    public function type($key)
    {
        return $this->lazyObjectReal->type(...\func_get_args());
    }

    public function unlink($key, ...$other_keys)
    {
        return $this->lazyObjectReal->unlink(...\func_get_args());
    }

    public function unsubscribe($channels): array|bool
    {
        return $this->lazyObjectReal->unsubscribe(...\func_get_args());
    }

    public function unwatch()
    {
        return $this->lazyObjectReal->unwatch(...\func_get_args());
    }

    public function watch($key, ...$other_keys)
    {
        return $this->lazyObjectReal->watch(...\func_get_args());
    }

    public function wait($count, $timeout): int
    {
        return $this->lazyObjectReal->wait(...\func_get_args());
    }

    public function xack($key, $group, $ids): int
    {
        return $this->lazyObjectReal->xack(...\func_get_args());
    }

    public function xadd($key, $id, $values, $maxlen = 0, $approx = false, $nomkstream = false): string
    {
        return $this->lazyObjectReal->xadd(...\func_get_args());
    }

    public function xautoclaim($key, $group, $consumer, $min_idle, $start, $count = -1, $justid = false): array|bool
    {
        return $this->lazyObjectReal->xautoclaim(...\func_get_args());
    }

    public function xclaim($key, $group, $consumer, $min_idle, $ids, $options): array|bool
    {
        return $this->lazyObjectReal->xclaim(...\func_get_args());
    }

    public function xdel($key, $ids): int
    {
        return $this->lazyObjectReal->xdel(...\func_get_args());
    }

    public function xgroup($operation, $key = null, $arg1 = null, $arg2 = null, $arg3 = false): mixed
    {
        return $this->lazyObjectReal->xgroup(...\func_get_args());
    }

    public function xinfo($operation, $arg1 = null, $arg2 = null): mixed
    {
        return $this->lazyObjectReal->xinfo(...\func_get_args());
    }

    public function xlen($key): int
    {
        return $this->lazyObjectReal->xlen(...\func_get_args());
    }

    public function xpending($key, $group, $start = null, $end = null, $count = -1, $consumer = null): string
    {
        return $this->lazyObjectReal->xpending(...\func_get_args());
    }

    public function xrange($key, $start, $end, $count = -1): array|bool
    {
        return $this->lazyObjectReal->xrange(...\func_get_args());
    }

    public function xread($streams, $count = -1, $block = -1): array|bool
    {
        return $this->lazyObjectReal->xread(...\func_get_args());
    }

    public function xreadgroup($group, $consumer, $streams, $count = 1, $block = 1): array|bool
    {
        return $this->lazyObjectReal->xreadgroup(...\func_get_args());
    }

    public function xrevrange($key, $start, $end, $count = -1): array|bool
    {
        return $this->lazyObjectReal->xrevrange(...\func_get_args());
    }

    public function xtrim($key, $maxlen, $approx = false): int
    {
        return $this->lazyObjectReal->xtrim(...\func_get_args());
    }

    public function zAdd($key, $score, $value): int
    {
        return $this->lazyObjectReal->zAdd(...\func_get_args());
    }

    public function zCard($key): int
    {
        return $this->lazyObjectReal->zCard(...\func_get_args());
    }

    public function zCount($key, $start, $end): int
    {
        return $this->lazyObjectReal->zCount(...\func_get_args());
    }

    public function zIncrBy($key, $value, $member): float
    {
        return $this->lazyObjectReal->zIncrBy(...\func_get_args());
    }

    public function zLexCount($key, $min, $max): int
    {
        return $this->lazyObjectReal->zLexCount(...\func_get_args());
    }

    public function zMscore($key, $member, ...$other_members): array
    {
        return $this->lazyObjectReal->zMscore(...\func_get_args());
    }

    public function zPopMax($key, $value = null): array
    {
        return $this->lazyObjectReal->zPopMax(...\func_get_args());
    }

    public function zPopMin($key, $value = null): array
    {
        return $this->lazyObjectReal->zPopMin(...\func_get_args());
    }

    public function zRange($key, $start, $end, $scores = null): array
    {
        return $this->lazyObjectReal->zRange(...\func_get_args());
    }

    public function zRangeByLex($key, $min, $max, $offset = -1, $count = -1): array
    {
        return $this->lazyObjectReal->zRangeByLex(...\func_get_args());
    }

    public function zRangeByScore($key, $start, $end, $options = []): array
    {
        return $this->lazyObjectReal->zRangeByScore(...\func_get_args());
    }

    public function zRandMember($key, $options = null): array|string
    {
        return $this->lazyObjectReal->zRandMember(...\func_get_args());
    }

    public function zRank($key, $member): int
    {
        return $this->lazyObjectReal->zRank(...\func_get_args());
    }

    public function zRem($key, $member, ...$other_members): int
    {
        return $this->lazyObjectReal->zRem(...\func_get_args());
    }

    public function zRemRangeByLex($key, $min, $max): int
    {
        return $this->lazyObjectReal->zRemRangeByLex(...\func_get_args());
    }

    public function zRemRangeByRank($key, $start, $end): int
    {
        return $this->lazyObjectReal->zRemRangeByRank(...\func_get_args());
    }

    public function zRemRangeByScore($key, $start, $end): int
    {
        return $this->lazyObjectReal->zRemRangeByScore(...\func_get_args());
    }

    public function zRevRange($key, $start, $end, $scores = null): array
    {
        return $this->lazyObjectReal->zRevRange(...\func_get_args());
    }

    public function zRevRangeByLex($key, $min, $max, $offset = -1, $count = -1): array
    {
        return $this->lazyObjectReal->zRevRangeByLex(...\func_get_args());
    }

    public function zRevRangeByScore($key, $start, $end, $options = []): array
    {
        return $this->lazyObjectReal->zRevRangeByScore(...\func_get_args());
    }

    public function zRevRank($key, $member): int
    {
        return $this->lazyObjectReal->zRevRank(...\func_get_args());
    }

    public function zScore($key, $member): float
    {
        return $this->lazyObjectReal->zScore(...\func_get_args());
    }

    public function zdiff($keys, $options = null): array
    {
        return $this->lazyObjectReal->zdiff(...\func_get_args());
    }

    public function zdiffstore($dst, $keys, $options = null): int
    {
        return $this->lazyObjectReal->zdiffstore(...\func_get_args());
    }

    public function zinter($keys, $weights = null, $options = null): array
    {
        return $this->lazyObjectReal->zinter(...\func_get_args());
    }

    public function zinterstore($dst, $keys, $weights = null, $aggregate = null): int
    {
        return $this->lazyObjectReal->zinterstore(...\func_get_args());
    }

    public function zscan($key, &$iterator, $pattern = null, $count = 0): array|bool
    {
        return $this->lazyObjectReal->zscan(...\func_get_args());
    }

    public function zunion($keys, $weights = null, $options = null): array
    {
        return $this->lazyObjectReal->zunion(...\func_get_args());
    }

    public function zunionstore($dst, $keys, $weights = null, $aggregate = null): int
    {
        return $this->lazyObjectReal->zunionstore(...\func_get_args());
    }
}
