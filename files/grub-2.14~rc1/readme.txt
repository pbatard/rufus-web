core.img was created from:
  https://alpha.gnu.org/gnu/grub/grub-2.14~rc1.tar.xz
on a Debian 13 x64 system using the commands:
  ./autogen.sh
  ./configure --disable-nls --enable-boot-time
  make -j4
  cd grub-core
  ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub biosdisk part_msdos fat ntfs exfat -o core.img
