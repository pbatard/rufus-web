core.img was created from:
  https://ftp.gnu.org/gnu/grub/grub-2.06.tar.xz
on a Debian 11.5 x64 system using the commands:
  ./autogen.sh
  # --enable-boot-time for Manjaro Linux
  ./configure --disable-nls --enable-boot-time
  make -j4
  cd grub-core
  ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub2 biosdisk fat exfat ext2 ntfs ntfscomp part_msdos -o core.img

Note that this version of GRUB is NONSTANDARD in that it uses
'/boot/grub2' prefix directory instead of '/boot/grub'.