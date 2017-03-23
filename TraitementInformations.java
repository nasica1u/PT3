/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package simplexmethod;

import java.util.ArrayList;

/**
 *
 * @author chris_000
 */
public class TraitementInformations {
    private static String problemStr;
    //false pour min, true pour max
    private static boolean minOrMaxBool;
    
    private final static int PLUS_PETIT_QUE=0;
    private final static int EGAL=1;
    private final static int PLUS_GRAND_QUE=2;
    
    private static int[][] leftParam = new int[1000][1000];
    private static int[] sign = new int[1000];
    private static int[] rightParam = new int[1000];
    
    private static ArrayList<String> lines = new ArrayList();
    
    public static void setProblem(String problem){
        problemStr = problem;
    }
    public static void setMinOrMax(boolean etat){
        minOrMaxBool = etat;
    }
    public static ArrayList<String> getList(){
        return lines;
    }
    
    public static void proceed(){
        char line='\n';
        int deb=0, fin=0;
        for(int i=0; i<problemStr.length(); i++){
            if(problemStr.charAt(i)==line){
                fin = i;
                lines.add(problemStr.substring(deb, fin).replaceAll("\n", ""));
            }
            deb = fin;
        }
        lines.add(problemStr.substring(fin, problemStr.length()).replaceAll("\n", ""));
    }
    
    public static void extract(){
        for(int i=0; i<lines.size(); i++){
            String s = lines.get(i);
            if(s.contains("<=")){
                sign[i]=PLUS_PETIT_QUE;
                String param = lines.get(i).substring(0, lines.get(i).indexOf("<"));
                String param2 = lines.get(i).substring(lines.get(i).indexOf("=")+1, lines.get(i).length());
                System.out.println(param+"-"+param2);
            }
            else if(s.contains(" = ")){
                sign[i]=EGAL;
            }
            else if(s.contains(">=")){
                sign[i]=PLUS_GRAND_QUE;
            }
        }
    }
}