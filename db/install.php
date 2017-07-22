<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *  Extra install actions.
 *
 * @author    Troy Williams
 * @author    Corey Davis
 * @package   enrol_arlo {@link https://docs.moodle.org/dev/Frankenstyle}
 * @copyright 2015 LearningWorks Ltd {@link http://www.learningworks.co.nz}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use enrol_arlo\plugin_config;

defined('MOODLE_INTERNAL') || die('Direct access to this script is forbidden.');

function xmldb_enrol_arlo_install() {
    global $CFG, $DB;

    $plugin = enrol_get_plugin('arlo');
    foreach ($plugin->get_config_defaults() as $name => $value) {
        $plugin->set_config($name, $value);
    }
    \enrol_arlo\manager::schedule('eventtemplates');
    \enrol_arlo\manager::schedule('events');
    \enrol_arlo\manager::schedule('onlineactivities');
    return true;
}
