Well, I don't have all day, so this GRUB 2.12 core.img was created from the GRUB *2.14* source
from https://ftp.gnu.org/gnu/grub/grub-2.14.tar.xz on a Debian 13 x64 system,
with https://github.com/gentoo/gentoo/raw/d51cbeb087dbbe979ff29af645f32071cce2834d/sys-boot/grub/files/grub-2.14-revert-image-base.patch
applied, since GRUB are STILL unable to perform BASIC testing of their releases, using the commands:
  patch -p1 < grub-2.14-revert-image-base.patch
  patch -p1 < grub_is_debug_enabled.patch
  ./autogen.sh
  ./configure --disable-nls --enable-boot-time
  make -j4
  cd grub-core
  ../grub-mkimage -v -O i386-pc -d. -p\(hd0,msdos1\)/boot/grub2 biosdisk fat exfat ext2 ntfs ntfscomp part_msdos -o core.img

Note that this version of GRUB is NONSTANDARD in that it uses '/boot/grub2' prefix directory instead of '/boot/grub'.
