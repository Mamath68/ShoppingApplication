import { FC } from "react";
import { StyleProp, Text, TextStyle, TouchableOpacity, ViewStyle } from "react-native";
import { ButtonStyles } from "@/theme";

interface MainBtnProps {
  name: string;
  onPress?: () => void;
  style?: StyleProp<ViewStyle> | StyleProp<ViewStyle>[];
  disabled?: boolean;
  textStyle?: StyleProp<TextStyle>;
}

export const MainBtn: FC<MainBtnProps> = ({ name, onPress, style, disabled, textStyle }) => {
  const isWhiteBtn = Array.isArray(style)
    ? style.some(s => s === ButtonStyles.whiteBtn)
    : style === ButtonStyles.whiteBtn;

  return (
    <TouchableOpacity
      onPress={onPress}
      disabled={disabled}
      style={[ButtonStyles.btn, style]}
    >
      <Text style={[
        ButtonStyles.btnTxt,
        isWhiteBtn ? ButtonStyles.whiteBtnTxtColor : null,
        textStyle
      ]}>
        {name}
      </Text>
    </TouchableOpacity>
  );
};
