---
layout: default
permalink: /tables/
title: Tables
---

# Tables

The default data provider lists the following tables:

## All Platforms

| Table                | Columns                                                                                                                                                                                                                                                                                                                                                             |
|----------------------|--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `bash_history`       | `username`, `command`, `history_file`                                                                                                                                                |
| `cpuid`              | `feature`, `value`, `output_register`, `output_bit`, `input_eax`                                                                                                                     |
| `crontab`            | `event`, `minute`, `hour`, `day_of_month`, `month`, `day_of_week`, `command`, `path`                                                                                                 |
| `etc_hosts`          | `address`, `hostnames`                                                                                                                                                               |
| `groups`             | `gid`, `name`                                                                                                                                                                        |
| `last`               | `login`, `tty`, `pid`, `type`, `time`, `host`                                                                                                                                        |
| `passwd_changes`     | `target_path`, `time`, `action`, `transaction_id`                                                                                                                                    |
| `process_envs`       | `pid`, `name`, `path`, `key`, `value`                                                                                                                                                |
| `process_open_files` | `pid`, `name`, `path`, `file_type`, `local_path`, `local_host`,<br>`local_port`, `remote_host`, `remote_port`                                                                        |
| `processes`          | `name`, `path`, `cmdline`, `pid`, `uid`, `gid`, `euid`, `egid`, `on_disk`, `wired_size`,<br>`resident_size`, `phys_footprint`, `user_time`, `system_time`, `start_time`,<br>`parent` |
| `routes`             | `destination`, `netmask`, `gateway`, `source`, `flags`, `interface`, `mtu`, `metric`, `type`                                                                                         |
| `suid_bin`           | `path`, `unix_user`, `unix_group`, `permissions`                                                                                                                                     |
| `time`               | `hour`, `minutes`, `seconds`                                                                                                                                                         |
| `users`              | `uid`, `gid`, `username`, `description`, `directory`, `shell`                                                                                                                        |

## Darwin

| Table                 | Columns                                                                                                                                                                                                                                                                                                                                  |
|-----------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `alf`                 | `allow_signed_enabled`, `firewall_unload`, `global_state`, `logging_enabled`,<br>`logging_option`, `stealth_enabled`, `version`                                                                                                                                                                                                          |
| `alf_exceptions`      | `path`, `state`                                                                                                                                                                                                                                                                                                                          |
| `alf_explicit_auths`  | `process`                                                                                                                                                                                                                                                                                                                                |
| `alf_services`        | `service`, `process`, `state`                                                                                                                                                                                                                                                                                                            |
| `apps`                | `name`, `path`, `bundle_executable`, `bundle_identifier`, `bundle_name`,<br>`bundle_short_version`, `bundle_version`, `bundle_package_type`, `compiler`,<br>`development_region`, `display_name`, `info_string`, `minimum_system_version`,<br>`category`, `applescript_enabled`, `copyright`                                             |
| `ca_certs`            | `common_name`, `not_valid_before`, `not_valid_after`, `key_algorithm`,<br>`key_usage`, `subject_key_id`, `authority_key_id`, `sha1`                                                                                                                                                                                                      |
| `homebrew_packages`   | `name`, `path`, `version`                                                                                                                                                                                                                                                                                                                |
| `interface_addresses` | `interface`, `address`, `mask`, `broadcast`, `point_to_point`                                                                                                                                                                                                                                                                            |
| `interface_details`   | `interface`, `mac`, `type`, `mtu`, `metric`, `ipackets`, `opackets`, `ibytes`, `obytes`,<br>`ierrors`, `oerrors`, `last_change`                                                                                                                                                                                                          |
| `kextstat`            | `idx`, `refs`, `size`, `wired`, `name`, `version`, `linked_against`                                                                                                                                                                                                                                                                      |
| `launchd`             | `path`, `name`, `label`, `run_at_load`, `keep_alive`, `on_demand`, `disabled`,<br>`user_name`, `group_name`, `stdout_path`, `stderr_path`, `start_interval`,<br>`program_arguments`, `program`, `watch_paths`, `queue_directories`,<br>`inetd_compatibility`, `start_on_mount`, `root_directory`,<br>`working_directory`, `process_type` |
| `listening_ports`     | `pid`, `port`, `protocol`, `family`, `address`                                                                                                                                                                                                                                                                                           |
| `nvram`               | `name`, `type`, `value`                                                                                                                                                                                                                                                                                                                  |
| `osx_version`         | `major`, `minor`, `patch`                                                                                                                                                                                                                                                                                                                |
| `quarantine`          | `path`, `creator`                                                                                                                                                                                                                                                                                                                        |
| `startup_items`       | `name`, `path`                                                                                                                                                                                                                                                                                                                           |

## Ubuntu, CentOS

| Table            | Columns                                                                                                                                              |
|------------------|------------------------------------------------------------------------------------------------------------------------------------------------------|
| `block_devices`  | `name`, `parent`, `vendor`, `model`, `size`, `uuid`, `type`, `label`                                                                                 |
| `kernel_modules` | `name`, `size`, `used_by`, `status`, `address`                                                                                                       |
| `mounts`         | `fsname`, `fsname_real`, `path`, `type`, `opts`, `freq`, `passno`,<br>`block_size`, `blocks`, `blocks_free`, `blocks_avail`, `inodes`, `inodes_free` |
| `pci_devices`    | `slot`, `device_class`, `vendor`, `model`                                                                                                            |
| `port_inode`     | `local_port`, `remote_port`, `local_ip`, `remote_ip`, `inode`                                                                                        |
| `rpm_packages`   | `name`, `version`, `release`, `source`, `size`, `sha1`, `arch`                                                                                       |
| `socket_inode`   | `pid`, `inode`                                                                                                                                       |

You can find the master list at [osquery.io](http://osquery.io/tables).
