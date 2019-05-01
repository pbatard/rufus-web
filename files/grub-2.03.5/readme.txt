This *Manjaro specific* core.img has been created from GRUB snapshot ad4bfeec5ca4cc8479e9353c530a7e77f76d26bd
(http://git.savannah.gnu.org/cgit/grub.git/snapshot/grub-ad4bfeec5ca4cc8479e9353c530a7e77f76d26bd.tar.gz)
and then more or less following https://gitlab.manjaro.org/packages/core/grub/blob/master/PKGBUILD by applying:
  - grub-revert-6400613.patch
  - grub-use-efivarfs.patch
  - grub-export-path.patch
  - grub-add-GRUB_COLOR_variables.patch
  - grub-manjaro-modifications.patch
  - grub-efi-console-implement-getkeystatus-support.patch
  - grub-efi-console-add-grub_console_read_key_stroke-helper-function.patch'
  - grub-make-grub_getkeystatus-helper-function-available-ever.patch'
  - grub-accept-esc-f8-and-holding-shift-as-user-interrupt-key.patch'
  - grub-rename-00_menu_auto_hide.in-to-01_menu_auto_hide.in.patch'
  - grub-grub-boot-success.timer-add-a-few-conditions-for-run.patch'
  - grub-docs-stop-using-polkit-pkexec-for-grub-boot-success.patch'
  - grub-add-grub-set-bootflag-utility.patch'
  - grub-add-auto-hide-menu-support.patch'
  - grub-00_menu_auto_hide-use-a-timeout-of-60s-for-menu_show.patch'
  - grub-00_menu_auto_hide-reduce-number-of-save_env-calls.patch'
  - grub-add-grub-boot-indeterminate.service.patch'
  - grub-add-incr-command-to-grub-editenv.patch'
  - grub-maybe_quiet.patch'
  - grub-gettext_quiet.patch'

Built was then achieved on a Debian 9.8 x64 system using the commands:
  ./bootstrap
  ./configure --disable-nls --enable-boot-time
  make -j4
  cd grub-core
  ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub biosdisk part_msdos fat ntfs exfat -o core.img
