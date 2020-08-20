<?php

namespace Tungst\UnallowedSound;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\Listener;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\plugin\PluginBase;

class UnallowedSound extends PluginBase implements Listener
{

	public function onEnable()
	{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onBreak(BlockBreakEvent $ev)
	{
		if ($ev->isCancelled()) {
			$block = $ev->getBlock();
			$block->getLevel()->broadcastLevelSoundEvent($block, LevelSoundEventPacket::SOUND_BREAK, $block->getRuntimeId());
		}
	}

	public function onPlace(BlockPlaceEvent $ev)
	{
		if ($ev->isCancelled()) {
			$block = $ev->getBlock();
			$block->getLevel()->broadcastLevelSoundEvent($block, LevelSoundEventPacket::SOUND_PLACE, $block->getRuntimeId());
		}
	}
}