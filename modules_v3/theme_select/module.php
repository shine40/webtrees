<?php
// webtrees: Web based Family History software
// Copyright (C) 2015 webtrees development team.
//
// Derived from PhpGedView
// Copyright (C) 2010 John Finlay
//
// This program is free software; you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation; either version 2 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA

use WT\Theme;

/**
 * Class theme_select_WT_Module
 */
class theme_select_WT_Module extends WT_Module implements WT_Module_Block {
	/** {@inheritdoc} */
	public function getTitle() {
		return /* I18N: Name of a module */ WT_I18N::translate('Theme change');
	}

	/** {@inheritdoc} */
	public function getDescription() {
		return /* I18N: Description of the “Theme change” module */ WT_I18N::translate('An alternative way to select a new theme.');
	}

	/** {@inheritdoc} */
	public function getBlock($block_id, $template = true, $cfg = null) {
		/** @var \WT\Theme\BaseTheme */
		$id = $this->getName() . $block_id;
		$class = $this->getName() . '_block';
		$title = $this->getTitle();
		$menu = Theme::theme()->menuThemes();

		if ($menu) {
			$content = '<div class="center theme_form">' . $menu . '</div><br>';

			if ($template) {
				return Theme::theme()->formatBlock($id, $title, $class, $content);
			} else {
				return $content;
			}
		} else {
			return '';
		}
	}

	/** {@inheritdoc} */
	public function loadAjax() {
		return false;
	}

	/** {@inheritdoc} */
	public function isUserBlock() {
		return true;
	}

	/** {@inheritdoc} */
	public function isGedcomBlock() {
		return true;
	}

	/** {@inheritdoc} */
	public function configureBlock($block_id) {
	}
}
