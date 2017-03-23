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
    
    private static int[][] leftParam = new int[100][100];//[ligne][x.index]
    private static int[] sign = new int[100];
    private static int[] rightParam = new int[100];
    
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
            String param="";
            String param2="";
            if(s.contains("<=")){
                sign[i]=PLUS_PETIT_QUE;
                param = lines.get(i).substring(0, lines.get(i).indexOf("<"));
                param2 = lines.get(i).substring(lines.get(i).indexOf("=")+1, lines.get(i).length()).replaceAll(" ", "");
            }
            else if(s.contains(" = ")){
                sign[i]=EGAL;
                param = lines.get(i).substring(0, lines.get(i).indexOf("="));
                param2 = lines.get(i).substring(lines.get(i).indexOf("=")+1, lines.get(i).length()).replaceAll(" ", "");
            }
            else if(s.contains(">=")){
                sign[i]=PLUS_GRAND_QUE;
                param = lines.get(i).substring(0, lines.get(i).indexOf(">"));
                param2 = lines.get(i).substring(lines.get(i).indexOf("=")+1, lines.get(i).length()).replaceAll(" ", "");
            }
            //System.out.println(param+"-"+param2+"/::/"+sign[i]);
            
            for(int j=0; j<param.length(); j++){
                if((param.charAt(j)=='x') && j!=0){
                    leftParam[i][Character.getNumericValue(param.charAt(j+1))]=Character.getNumericValue(param.charAt(j-1));
                }
                else if((param.charAt(j)=='x') && j==0){
                    leftParam[i][Character.getNumericValue(param.charAt(j+1))]=0;
                }
                //System.out.println("L'int: "+leftParam[i][Integer.parseInt(""+param.charAt(j+1))]);
            }
            rightParam[i]=Integer.parseInt(param2);
            //System.out.println(leftParam[i][0]+" :-: "+rightParam[i]+" /::/ "+sign[i]);
        }
    }
    
    public static int getNbParams(){
        int params = 0;
        for(int i=0; i<leftParam[0].length; i++){
            for(int j=0; j<leftParam[1].length; j++){
                if(leftParam[i][j]!=0 && leftParam[i][j+1]==0 && j>params){
                    params=j+1;
                }
            }
        }
        return params;
    }
    
    public static int getNbContraintes(){
        int contraintes = 0;
        for(int i=0; i<leftParam[0].length; i++){
            if(leftParam[i][0]!=0 && leftParam[i+1][0]==0 && i>contraintes){
                contraintes=i+1;
            }
        }
        System.out.println(contraintes);
        return contraintes;
    }
}